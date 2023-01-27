<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQrCodeRequest;
use App\Http\Requests\StoreQrCodeRequest;
use App\Http\Requests\UpdateQrCodeRequest;
use App\Models\Partner;
use App\Models\Analytic;
use App\Models\AnalyticType;
use App\Models\Transaction;
use App\Models\TransactionType;
use App\Models\QrCode;
use App\Models\User;
use App\Models\UserQrCode;
use Gate;
use Auth;
use OneSignal;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QrCodeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('qr_code_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qrCodes = QrCode::with(['user', 'partner'])->get();

        return view('admin.qrCodes.index', compact('qrCodes'));
    }

    public function create()
    {
        abort_if(Gate::denies('qr_code_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $partners = Partner::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.qrCodes.create', compact('partners', 'users'));
    }

    public function store(StoreQrCodeRequest $request)
    {
        $qrCode = QrCode::create($request->all());

        return redirect()->route('admin.qr-codes.index');
    }

    public function edit(QrCode $qrCode)
    {
        abort_if(Gate::denies('qr_code_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $partners = Partner::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $qrCode->load('user', 'partner');

        return view('admin.qrCodes.edit', compact('partners', 'qrCode', 'users'));
    }

    public function update(UpdateQrCodeRequest $request, QrCode $qrCode)
    {
        $qrCode->update($request->all());

        return redirect()->route('admin.qr-codes.index');
    }

    public function show(QrCode $qrCode)
    {
        abort_if(Gate::denies('qr_code_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qrCode->load('user', 'partner');

        return view('admin.qrCodes.show', compact('qrCode'));
    }

    public function destroy(QrCode $qrCode)
    {
        abort_if(Gate::denies('qr_code_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qrCode->delete();

        return back();
    }

    public function massDestroy(MassDestroyQrCodeRequest $request)
    {
        QrCode::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function awardbryghia($id){

        $user = User::find($id);
        $loggeduser = Auth::user();

        if ($loggeduser->userpartners->count() < 1) {

            return redirect('/admin')->with('danger', "You're not assigned to any partners");
        }

        return view('admin.qrCodes.award', compact('user', 'loggeduser'));

    }

    public function processaward(Request $request){

        $user = User::find($request->user_id);
        $loggeduser = Auth::user();

        if($loggeduser->userpartners->where('partner_id', $request->partner_id)->doesntExist()){
            return redirect()->back()->with('danger', "You don't have permission to this partner");
        }

        if ($request->transaction_total -= 0) {
            return redirect()->back()->with('danger', 'Total most be more than 0');
        }

        $award = New Qrcode;
        $award->created_by_user_id = $loggeduser->id;
        $award->user_id = $user->id;
        $award->transaction_total = $request->transaction_total;
        $award->issued_bryghia = $request->transaction_total *.1;
        $award->partner_id = $request->partner_id;
        $award->save();

        $user->bryghia += $award->issued_bryghia;
        $user->update();

        $partner = Partner::find($request->partner_id);

        if ($partner) {
            if ($user->udid != null) {
                //agregar código de las notificaciones
                $userId = $user->udid;
                OneSignal::sendNotificationToUser(
                    "Succes! ".$partner->name." has given you ".$award->issued_bryghia." bryghia",
                    $userId,
                    $url = null,
                    $data = null,
                    $buttons = null,
                    $schedule = null
                );
            }
        }

        $transaction = new Transaction;
        $transaction->value = $request->transaction_total;
        $transaction->status = 1;
        $transaction->user_id = $user->id;
        $transaction->transaction_type = TransactionType::where('name', 'Bryghia Award')->first()->id;
        $transaction->save();


        $analytic = new Analytic;
        $analytic->value = $award->issued_bryghia;
        $analytic->user_id = $user->id;
        $analytic->type_id = AnalyticType::where('name', 'Bryghia Award')->first()->id;
        $analytic->save();


        return redirect()->route('admin.qr-codes.index')->with('sucess', 'Bryghia has been awarded successfuly');
    }
}
