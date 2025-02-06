<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
    window.Laravel = {
        csrfToken: '{{ csrf_token() }}',
        routes: {
            LeaveCalculationShow: '{{ secure_url("/hrm/leave/calculate") }}',
            TakenDatesByUser: '{{ secure_url("/hrm/leave/taken-dates/" . auth()->id()) }}',
            GetBankTransferSetup: '{{ url("/setting/bsp_bank_transfer_setups/get-bank-transfer-setup")}}',    //-----------
            CheckBankExists: '{{ secure_url("/setting/check-bank-exists")}}',
            BspBankTransferSetupStore: '{{ secure_url("/setting/bsp_bank_transfer_setups/store_setting") }}',
            BspBankTransferSetupRemove: '{{ secure_url("/setting/bsp_bank_transfer_setups/remove")}}',
            BspBankTransferSetupUpdate: '{{ secure_url("/setting/bsp_bank_transfer_setups/update")}}',
            BspBankSettingStore: '{{ secure_url("/setting/bsp_bank_transfer_setups/store_bank") }}',
            
            GetAnzBankTransferSetup: '{{ url("/setting/anz_bank_transfer_setups/get-anz-bank-transfer-setup") }}',   //--------------
            CheckAnzBankExists: '{{ secure_url("/setting/check-anz-bank-exists") }}',
            AnzBankTransferSetupStore: '{{ secure_url("/setting/anz_bank_transfer_setups/store_setting") }}',
            AnzBankTransferSetupRemove: '{{ secure_url("/setting/anz_bank_transfer_setups/remove") }}',
            AnzBankTransferSetupUpdate: '{{ secure_url("/setting/anz_bank_transfer_setups/update") }}',
            AnzBankSettingStore: '{{ secure_url("/setting/anz_bank_transfer_setups/store_bank") }}',

             // WPAC Bank Transfer Setup
            GetWpacBankTransferSetup: '{{ url("/setting/wpac_bank_transfer_setups/get-wpac-bank-transfer-setup") }}',   //------------
            CheckWpacBankExists: '{{ secure_url("/setting/check-wpac-bank-exists") }}',
            WpacBankTransferSetupStore: '{{ secure_url("/setting/wpac_bank_transfer_setups/store_setting") }}',
            WpacBankTransferSetupRemove: '{{ secure_url("/setting/wpac_bank_transfer_setups/remove") }}',
            WpacBankTransferSetupUpdate: '{{ secure_url("/setting/wpac_bank_transfer_setups/update") }}',
            WpacBankSettingStore: '{{ secure_url("/setting/wpac_bank_transfer_setups/store_bank") }}',

            // Kina Bank Transfer Setup
            GetKinaBankTransferSetup: '{{ url("/setting/kina_bank_transfer_setups/get-kina-bank-transfer-setup") }}',   //-------------------
            CheckKinaBankExists: '{{ secure_url("/setting/check-kina-bank-exists") }}',
            KinaBankTransferSetupStore: '{{ secure_url("/setting/kina_bank_transfer_setups/store_setting") }}',
            KinaBankTransferSetupRemove: '{{ secure_url("/setting/kina_bank_transfer_setups/remove") }}',
            KinaBankTransferSetupUpdate: '{{ secure_url("/setting/kina_bank_transfer_setups/update") }}',
            KinaBankSettingStore: '{{ secure_url("/setting/kina_bank_transfer_setups/store_bank") }}',
            
            //Pay Item
            PayItemEdit : '{{ secure_url("/setting/pay_items/edit") }}',
            PayItemDel : '{{ secure_url("/setting/pay_items/destroy") }}',
            PayItemUpdate : '{{ secure_url("/setting/pay_items/update") }}',
            PayItemAdd :  '{{ secure_url("/setting/pay_items/store") }}',

            //Pay Reference
            SavePayRefInclEmpl : '{{ secure_url("/process_pay/pay_references/save_pay_reference") }}',
            PayRefAddLoanRoute: '{{ secure_url("/process_pay/pay_references/pay_reference_add_loan") }}',
            PayRefAddLeaveRoute: '{{ secure_url("/process_pay/pay_references/pay_reference_add_leave") }}',
            PayRefEmpSlip: '{{ secure_url("/process_pay/pay_references/payslip") }}',
            PayRefSalaryDays: '{{ url("/process_pay/pay_references/salary_days_count") }}',    //---------------
            PayRefPayItems: '{{ secure_url("/process_pay/pay_references/submit_pay_reference_payitems") }}',
            PayRefPayItemSubmit: '{{ secure_url("/process_pay/pay_references/payref_approved")}}',
            PayRefPayItemReject: '{{ secure_url("/process_pay/pay_references/payref_rejected")}}',
            //Employee Payroll Calculation Route
            EmplPayrollHRAAreaSrc: "{{ secure_url('/hrm/payroll/hra_area_src') }}",
            EmplPayrollHRA: "{{ secure_url('/hrm/payroll/hra') }}",
            EmplPayrollVehicle: "{{ secure_url('/hrm/payroll/vehicle') }}",
            EmplPayrollMeals: "{{ secure_url('/hrm/payroll/meals') }}",
            EmplPayrollTaxCal: "{{ secure_url('/hrm/payroll/taxcal') }}",

            //Attendance
            AttendanceSearch: '{{ secure_url("/hrm/attendance/search") }}',
             //PayLocation
            PayLocationBankDetails: '{{ secure_url("/setting/pay_locations/bank_detail") }}',
            
            
            //Company
            CompanyBankDetails: '{{ secure_url("/setting/company/bank_detail/") }}',
           
        }
    };
</script>