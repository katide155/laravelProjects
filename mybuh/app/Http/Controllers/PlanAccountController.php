<?php

namespace App\Http\Controllers;

use App\Models\PlanAccount;
use App\Models\AccountType;
use App\Http\Requests\StorePlanAccountRequest;
use App\Http\Requests\UpdatePlanAccountRequest;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;


class PlanAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$pages_in_sheet = 20;
		$acountsTypes = AccountType::all();
		$accounts = PlanAccount::with('planAccountType')->sortable()->orderBy('account_number')->paginate($pages_in_sheet);
		//$accounts = PlanAccount::sortable()->orderBy('account_number')->paginate(20);
		//dd($accounts->toarray($accounts));
		return view('accounts-plan.index', ['accounts'=>$accounts, 'acountsTypes'=>$acountsTypes, 'pages_in_sheet' => $pages_in_sheet]);
    }
	
    public function indexAjax()
    {
		$acountsTypes = AccountType::all();
		$accounts = PlanAccount::with('planAccountType')->sortable()->orderBy('account_number')->paginate($pages_in_sheet);
		

		$response_array = array(
            'accounts' => $accounts,
			'pages_in_sheet' => $pages_in_sheet
        );

		$json_response = response()->json($response_array);
		
		return $json_response;	
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlanAccountRequest  $request
     * @return \Illuminate\Http\Response
     */

	public function store(Request $request){
		
		$input = [
			'account_number' => $request->account_number,
			'account_title' => $request->account_title,
			'account_type_id' => $request->account_type_id,
		];
		
		$rules = [
			'account_number' => 'required',
			'account_title' => 'required',
			'account_type_id' => 'nullable|integer',
		];
		
		$customMessages = [
			'required' => 'The field  is required',//"'..'"
		
		];
		
		$validator = Validator::make($input, $rules/*, $customMessages nebūtinas argumentas*/);
		
		if($validator->fails()){
			
			$errors = $validator->messages()->get('*');
			$response_info = array(
				'error_message' => 'Nepraejo',
				'errors' => $errors
			);			
			
			
		}
		else{
			
			$planAccount = new PlanAccount;
			$planAccount->account_number = $request->account_number;
			$planAccount->account_title = $request->account_title;
			$planAccount->account_type_id = $request->account_type_id;
			$planAccount->grouped_account = $request->grouped_account;
			
			$planAccount->save();
			
			$sort = $request->sort;
			$direction = $request->direction;
			
			//$accounts = PlanAccount::with('planAccountType')->sortable()->orderBy('account_number')->paginate(20);
			$accounts = PlanAccount::with('planAccountType')->sortable([$sort => $direction])->paginate(20);
			
			//dd($accounts->toarray($accounts));
			$account_type_title = "";
			
			if( isset($planAccount->planAccountType->account_type_title) )
				$account_type_title = $planAccount->planAccountType->account_type_title;
			
			
			$response_info = array(
				'success_message' => 'Account saved successfuly',
				'account_number' => $planAccount->account_number,
				'account_title' => $planAccount->account_title,
				'account_type_id' => $planAccount->account_type_id,
				'plan_account_id' => $planAccount->id,
				'account_type' => $account_type_title,
				'accounts' => $accounts,
			);
		}
		$jason_response = response()->json($response_info);
		
		return $jason_response;	
	}
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlanAccount  $planAccount
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
		$pages_in_sheet = $request->pages_in_sheet;
		$sort = $request->sort;
		$direction = $request->direction;
		$count_accounts = count(PlanAccount::all());
		
		if($pages_in_sheet == 1) {
			$pages_in_sheet = $count_accounts;
		} 
			$accounts = PlanAccount::with('planAccountType')->sortable([$sort => $direction])->paginate($pages_in_sheet);
	
		
		$acountsTypes = AccountType::all();


		$response_array = array(
            'accounts' => $accounts,
			'sort' => $sort,
			'direction' => $direction
        );

		$json_response = response()->json($response_array);
		
		return $json_response;	
    }
	
	
	public function showItem(PlanAccount $planAccount)
	{
		$account_type_title = "";
		
		if( isset($planAccount->planAccountType->account_type_title) )
			$account_type_title = $planAccount->planAccountType->account_type_title;		
		
		$response_info = array(
			'account_number' => $planAccount->account_number,
			'account_title' => $planAccount->account_title,
			'account_type_id' => $planAccount->account_type_id,
			'grouped_account' => $planAccount->grouped_account,
			'plan_account_id' => $planAccount->id,
			'plan_account_type' => $account_type_title,
		);
		
		$jason_response = response()->json($response_info);
		
		return $jason_response;	
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlanAccount  $planAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(PlanAccount $planAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlanAccountRequest  $request
     * @param  \App\Models\PlanAccount  $planAccount
     * @return \Illuminate\Http\Response
     */
    public function updateItem(Request $request, PlanAccount $planAccount)
    {
		
		$input = [
			'account_number' => $request->account_number,
			'account_title' => $request->account_title,
			'account_type_id' => $request->account_type_id,
		];
		
		$rules = [
			'account_number' => 'required',
			'account_title' => 'required',
			'account_type_id' => 'nullable|integer',
		];
		
		$customMessages = [
			'required' => 'The field  is required',//"'..'"
		
		];
		
		$validator = Validator::make($input, $rules/*, $customMessages nebūtinas argumentas*/);
		
		if($validator->fails()){
			
			$errors = $validator->messages()->get('*');
			$response_info = array(
				'error_message' => 'Nepraejo',
				'errors' => $errors
			);			
			
			
		}
		else{
			
			$planAccount->account_number = $request->account_number;
			$planAccount->account_title = $request->account_title;
			$planAccount->account_type_id = $request->account_type_id;
			$planAccount->grouped_account = $request->grouped_account;
			
			$planAccount->save();
			
			$sort = $request->sort;
			$direction = $request->direction;
			
			//$accounts = PlanAccount::with('planAccountType')->sortable()->orderBy('account_number')->paginate(20);
			$accounts = PlanAccount::with('planAccountType')->sortable([$sort => $direction])->paginate(20);
			
			//dd($accounts->toarray($accounts));
			$account_type_title = "";
			
			if( isset($planAccount->planAccountType->account_type_title) )
				$account_type_title = $planAccount->planAccountType->account_type_title;
			
			
			$response_info = array(
				'success_message' => 'Article saved successfuly',
				'account_number' => $planAccount->account_number,
				'account_title' => $planAccount->account_title,
				'account_type_id' => $planAccount->account_type_id,
				'plan_account_id' => $planAccount->id,
				'account_type' => $account_type_title,
				'accounts' => $accounts,
			);
		}
		$jason_response = response()->json($response_info);
		
		return $jason_response;	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlanAccount  $planAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlanAccount $planAccount)
    {
		$accounts = PlanAccount::with('planAccountType')->sortable([$sort => $direction])->paginate($pages_in_sheet);
        $planAccount->delete();
		$response_info = array(
			
			'success_message' => 'Sąskaita '.$planAccount->title.' sėkmingai ištrinta',
 		);
		
		$json_response = response()->json($response_info);
		
		return $json_response;
    }

	// -----------------------------------------------
	// -----------------------------------------------
	// -----------------------------------------------
	
	public function destroyMany(Request $request)
    {
		$deletionList = $request->deletionList;
		  
			foreach($deletionList as $account) {

				PlanAccount::where('id', $account)->delete();
	
			}

			$sort = $request->sort;
			$direction = $request->direction;
			
			$accounts = PlanAccount::with('planAccountType')->sortable([$sort => $direction])->paginate(20);			

			//$accounts = PlanAccount::sortable()->get();
			
			$response_info = array(
				'success_message' => 'Sąskaitos sėkmigai ištrintos',
				 'accounts' => $accounts
			);
		
		$json_response = response()->json($response_info);
		
		return $json_response;
    }
	
	// -----------------------------------------------
	// ----------DuomenuImportas is excel--------------------
	// -----------------------------------------------
	
	function importData(Request $request){
	   
       $this->validate($request, [
           'uploaded_file' => 'required|file|mimes:xls,xlsx'

       ]);

       $the_file = $request->file('uploaded_file');

       try{

           $spreadsheet = IOFactory::load($the_file->getRealPath());
           $sheet        = $spreadsheet->getActiveSheet();
           $row_limit    = $sheet->getHighestDataRow();
           $column_limit = $sheet->getHighestDataColumn();
           $row_range    = range( 1, $row_limit );
           $column_range = range( 'D', $column_limit );
           $startcount = 1;

           $data = array();
           foreach ( $row_range as $row ) {
			   
			   $account_type_id = $sheet->getCell( 'D' . $row )->getValue();
			   if(!$account_type_id)
				   $account_type_id = 1;
			   
               $data[] = [
                   'account_number' =>$sheet->getCell( 'A' . $row )->getValue(),
                   'account_title' => $sheet->getCell( 'B' . $row )->getValue(),
                   'grouped_account' => $sheet->getCell( 'C' . $row )->getValue(),
                   'account_type_id' => $account_type_id,
               ];
               $startcount++;
           }
           DB::table('plan_accounts')->insert($data);

       } catch (Exception $e) {
           $error_code = $e->errorInfo[1];
           return back()->withErrors('There was a problem uploading the data!');
       }
       return back()->with('success_message','Great! Data has been successfully uploaded.');
   }
   
   	// -----------------------------------------------
	// ---------Paieška------------
	// -----------------------------------------------
   
   	public function searchAccount(Request $request){
		
		$searchValue = $request->searchValue;
		
		$accounts = PlanAccount::query()
		->where('account_number', 'like', "%{$searchValue}%")
		->orwhere('account_title', 'like', "%{$searchValue}%")
		->orwhere('account_type_id', 'like', "%{$searchValue}%")
		->orwhere('id', 'like', "%{$searchValue}%")
		->paginate(20);
		
		if(count($accounts) > 0){
			$response_info = array(
				'accounts' => $accounts
			);
		}else{
			
			$response_info = array(
				'error_message' => 'Pagal ieškomą frazę "'.$searchValue.'" nieko nerasta!'
			);			
			
		}
	
		$json_response = response()->json($response_info);
		
		return $json_response;
		
	}
}
