<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResidentRegisterController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\AdminRegisterController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/*------------------------------------------
--------------------------------------------
All Superadmin Routes List
--------------------------------------------
--------------------------------------------*/



Route::middleware(['auth', 'user-access:superadmin'])->group(function () {
  
    Route::get('/superadmin/home', [HomeController::class, 'superadminHome'])->name('superadmin.home');

    Route::get('/superadmin/register-admin', [AdminRegisterController::class, 'showRegisteradminForm'])->name('superadmin.register.admin.form');
    Route::post('/superadmin/register-admin', [AdminRegisterController::class, 'registeradmin'])->name('superadmin.register.admin');
Route::get('/superadmin/admin-list', [AdminRegisterController::class, 'showAdmins'])->name('superadmin.admin.list');

});
  
Route::get('admin/verify/otp/{id}', [AdminRegisterController::class, 'showOtpForm'])->name('admin.verify.otp.form');
Route::post('admin/verify/otp/{id}', [AdminRegisterController::class, 'verifyOtp'])->name('admin.verify.otp');

Route::get('admin/setup/password/{id}', [AdminRegisterController::class, 'showPasswordSetupForm'])->name('admin.setup.password.form');
Route::post('admin/setup/password/{id}', [AdminRegisterController::class, 'setupPassword'])->name('admin.setup.password');
  
/*------------------------------------------
--------------------------------------------
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/home', [AdminRegisterController::class, 'adminCount'])->name('admin.home');

  

    // Route::get('/income', function () {
    //     return view('admin.Income.residentMaintenance');
    // })->name('income');

    Route::get('/flats', function () {
        return view('admin.flats.index');
    })->name('flats');


    Route::get('/flatsform', function () {
        return view('admin.flats.create');
    })->name('flatscreate');


    Route::get('/openrequest', function () {
        return view('admin.helpdesk.openrequest');
    })->name('admin.helpdesk.opendesk');
    Route::get('/openrequest-create', function () {
        return view('admin.helpdesk.create');
    })->name('helpdesk-create');
 

  
    
    });
    
    use App\Http\Controllers\FlatImportController;

    Route::middleware(['auth', 'user-access:admin'])->group(function () {
        Route::get('/flatimport', [FlatImportController::class, 'showUploadForm'])->name('admin.flatimport.show');
        Route::post('/flatimport', [FlatImportController::class, 'import'])->name('admin.flatimport.import');
        
        // Display flats, edit, update, and delete routes
        Route::get('/flatimport/index', [FlatImportController::class, 'index'])->name('admin.flatimport.index');
        Route::get('/flatimport/edit/{id}', [FlatImportController::class, 'edit'])->name('admin.flatimport.edit');
        Route::put('/flatimport/update/{id}', [FlatImportController::class, 'update'])->name('admin.flatimport.update');
        Route::delete('/flatimport/destroy/{id}', [FlatImportController::class, 'destroy'])->name('admin.flatimport.destroy');
    });
    
    
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});


// Route::middleware(['auth', 'user-access:resident'])->group(function () {
  
//     Route::get('/resident/home', [HomeController::class, 'residentHome'])->name('resident.home');
// });


use App\Http\Controllers\WatchmanVisitorController;

Route::middleware(['auth', 'user-access:watchman'])->group(function () {
  
    Route::get('/watchman/home', [HomeController::class, 'watchmanHome'])->name('watchman.home');
    Route::get('/watchman/visitors', [WatchmanVisitorController::class, 'index'])->name('watchman.visitors.index');
Route::get('/resident-details', [WatchmanVisitorController::class, 'getResidentDetails'])->name('resident.details');

Route::get('/watchman/visitors/create', [WatchmanVisitorController::class, 'create'])->name('watchman.visitors.create');
    Route::post('/watchman/visitors', [WatchmanVisitorController::class, 'store'])->name('visitors.store');
    // Route::post('/watchman/visitor/{id}/checkin', [WatchmanVisitorController::class, 'checkin'])->name('watchman.visitor.checkin.time');
    // Route::post('/watchman/visitor/{id}/checkout', [WatchmanVisitorController::class, 'checkout'])->name('watchman.visitor.checkout.time');

    Route::prefix('watchman')->group(function () {
    Route::get('visitors', [WatchmanVisitorController::class, 'index'])->name('watchman.visitors.index');
    Route::get('visitors/checkin/{id}', [WatchmanVisitorController::class, 'checkin'])->name('watchman.visitors.checkin');
    Route::get('visitors/checkout/{id}', [WatchmanVisitorController::class, 'checkout'])->name('watchman.visitors.checkout');
});

 
});



use App\Http\Controllers\AdminController;

use App\Http\Controllers\WatchmanRegisterController;
use App\Http\Controllers\SecondaryuserController;
use App\Http\Controllers\CategoryController;

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/register-watchman', [WatchmanRegisterController::class, 'showRegisterWatchmanForm'])->name('admin.register.watchman.form');
    Route::post('/admin/register-watchman', [WatchmanRegisterController::class, 'registerWatchman'])->name('admin.register.watchman');
Route::get('/admin/watchmen', [WatchmanRegisterController::class, 'showWatchmanList'])->name('admin.watchman-list');
Route::get('/admin/watchmen/{id}', [WatchmanRegisterController::class, 'viewWatchman'])->name('admin.watchman-view');
Route::get('/admin/watchmen/{id}/edit', [WatchmanRegisterController::class, 'editWatchman'])->name('admin.watchman-edit');
Route::post('/admin/watchmen/{id}/update', [WatchmanRegisterController::class, 'updateWatchman'])->name('admin.watchman-update');
Route::delete('/admin/watchmen/{id}', [WatchmanRegisterController::class, 'deleteWatchman'])->name('admin.watchman-delete');

});
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/register-secondaryuser', [SecondaryuserController::class, 'showRegistersecondaryuserForm'])->name('admin.register.secondaryuser.form');
    Route::post('/admin/register-secondaryuser', [SecondaryuserController::class, 'registersecondaryuser'])->name('admin.register.secondaryuser');
Route::get('/admin/secondaryuser', [SecondaryuserController::class, 'showsecondaryuserList'])->name('admin.secondaryuser-list');
Route::get('/admin/secondaryuser/{id}', [SecondaryuserController::class, 'viewsecondaryuser'])->name('admin.secondaryuser-view');
Route::get('/admin/secondaryuser/{id}/edit', [SecondaryuserController::class, 'editsecondaryuser'])->name('admin.secondaryuser-edit');
Route::post('/admin/secondaryuser/{id}/update', [SecondaryuserController::class, 'updatesecondaryuser'])->name('admin.secondaryuser-update');
Route::delete('/admin/secondaryuser/{id}', [SecondaryuserController::class, 'deletesecondaryuser'])->name('admin.secondaryuser-delete');

});
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/register-manager', [AdminController::class, 'showRegisterManagerForm'])->name('admin.register.manager.form');
    Route::post('/admin/register-manager', [AdminController::class, 'registerManager'])->name('admin.register.manager');

    Route::get('/admin/register-resident', [ResidentRegisterController::class, 'showRegisterResidentForm'])->name('admin.register.resident.form');
    Route::post('/admin/register-resident', [ResidentRegisterController::class, 'registerResident'])->name('admin.register.resident');
Route::get('admin/view-residents', [ResidentRegisterController::class, 'viewResidents'])->name('admin.view.residents');
Route::delete('admin/view-residents/{id}', [ResidentRegisterController::class, 'residentDelete'])->name('admin.view.deleteresidents');

Route::get('admin/resident/{id}', [ResidentRegisterController::class, 'showResident'])->name('admin.resident.show');
Route::get('admin/resident/edit/{id}', [ResidentRegisterController::class, 'editResident'])->name('admin.resident.edit');
Route::put('admin/resident/update/{id}', [ResidentRegisterController::class, 'updateResident'])->name('admin.resident.update');



    Route::get('/admin/users', [AdminController::class, 'showUsers'])->name('admin.show_users');


// Show all categories
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');

// Show the form for creating a new category
Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');


Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');



// Update the specified category in storage
Route::put('/admin/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');

// Remove the specified category from storage
Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
// Show the form for editing the specified category (for AJAX)
Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');



// Route to show the registration form with categories
Route::get('/admin/newuser', [CategoryController::class, 'showRegisterForm'])->name('admin.newuser');

});




use App\Http\Controllers\ManagerController;

Route::middleware(['auth', 'user-access:manager'])->group(function () {
    Route::get('/manager/register-resident', [ManagerController::class, 'showRegisterResidentForm'])->name('manager.register.resident.form');
    Route::post('/manager/register-resident', [ManagerController::class, 'registerResident'])->name('manager.register.resident');

});
use App\Http\Controllers\ManagerEntryPassController;

Route::get('/manager/entry-passes', [ManagerEntryPassController::class, 'index'])->name('manager.entrypass');





use App\Http\Controllers\EntryPassController;

// Route::get('/entry-passes', [EntryPassController::class, 'index'])->name('entry-passes.index');
// Route::get('entry-passes/create', [EntryPassController::class, 'create'])->name('entry-passes.create');
// Route::post('entry-passes', [EntryPassController::class, 'store'])->name('entry-passes.store');
// Route::get('/entry-passes/{id}', [EntryPassController::class, 'show'])->name('entry-passes.show');
// Route::delete('/entry-passes/{id}', [EntryPassController::class, 'destroy'])->name('entry-passes.destroy');
// Route::get('/entry-passes/{id}/edit', [EntryPassController::class, 'edit'])->name('entry-passes.edit');
// Route::put('/entry-passes/{id}', [EntryPassController::class, 'update'])->name('entry-passes.update');


use App\Http\Controllers\VisitorController;


Route::middleware(['auth', 'user-access:resident'])->group(function () {
    Route::get('/resident/home', [HomeController::class, 'residentHome'])->name('resident.home');
   

    
    // Entry Passes Routes for Resident
    Route::get('/entry-passes', [EntryPassController::class, 'index'])->name('resident.entry-passes.index');
    Route::get('/entry-passes/create', [EntryPassController::class, 'create'])->name('resident.entry-passes.create');
    Route::post('/entry-passes', [EntryPassController::class, 'store'])->name('resident.entry-passes.store');
    Route::get('/entry-passes/{id}', [EntryPassController::class, 'show'])->name('resident.entry-passes.show');
    Route::delete('/entry-passes/{id}', [EntryPassController::class, 'destroy'])->name('resident.entry-passes.destroy');
    Route::get('/entry-passes/{id}/edit', [EntryPassController::class, 'edit'])->name('resident.entry-passes.edit');
    Route::put('/entry-passes/{id}', [EntryPassController::class, 'update'])->name('resident.entry-passes.update');
    Route::get('/residentfacilities', [FacilityController::class, 'residentIndex'])->name('resident.facilities.index');
   
  



    // Entry visitors Routes for Resident
Route::get('/visitors', [VisitorController::class, 'index'])->name('resident.visitors.index');
    Route::get('/visitors/create', [VisitorController::class, 'create'])->name('resident.visitors.create');
    Route::post('/visitors', [VisitorController::class, 'store'])->name('resident.visitors.store');
    Route::get('/visitors/{id}/edit', [VisitorController::class, 'edit'])->name('resident.visitors.edit');
    Route::put('/visitors/{id}', [VisitorController::class, 'update'])->name('resident.visitors.update');
    Route::delete('/visitors/{id}', [VisitorController::class, 'destroy'])->name('resident.visitors.destroy');
    Route::get('/visitors/{id}', [VisitorController::class, 'show'])->name('resident.visitors.show');
Route::post('/residents/visitors/{id}/approve', [VisitorController::class, 'approve'])->name('resident.visitors.approve');
Route::post('/residents/visitors/{id}/reject', [VisitorController::class, 'reject'])->name('resident.visitors.reject');
});


use App\Http\Controllers\DirectoryController;

   //Routes for directory 
Route::get('/directory/neighbours', [DirectoryController::class, 'neighbours'])->name('resident.directory.neighbours');


// routes/web.php




Route::get('/', function () {
    return view('dashboard');
});




Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expenses.create');
Route::post('/expense', [ExpenseController::class, 'store'])->name('expenses.store');
Route::get('/expense', [ExpenseController::class, 'index'])->name('expenses.index');
Route::get('/expenses/{id}/edit', [ExpenseController::class, 'edit'])->name('expenses.edit'); // Edit route
Route::put('/expenses/{id}', [ExpenseController::class, 'update'])->name('expenses.update'); // Update route
Route::delete('/expenses/{id}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');

use App\Http\Controllers\ResidentExpenseController;

// Ensure that the route is protected with middleware, if needed
Route::middleware(['auth', 'user-access:resident'])->group(function () {
    Route::get('/resident/expenses', [ResidentExpenseController::class, 'apartmentexpenditure'])->name('resident.expenses.index');
  
    
});


// routes/web.php
use App\Http\Controllers\ResidentActivityController;

Route::get('/resident/activities', function () {
    return view('resident.activities.index');
})->name('resident.activities.index');

Route::get('/resident/activities/booking-history', [ResidentActivityController::class, 'bookingHistory'])->name('resident.activities.booking-history');


use App\Http\Controllers\FacilityController;

// Resident Routes
Route::middleware(['auth', 'user-access:resident'])->group(function () {
    Route::get('/residentfacilities', [FacilityController::class, 'residentIndex'])->name('resident.facilities.index');
    Route::get('/residentfacilities/booking-history', [FacilityController::class, 'bookingHistory'])->name('resident.facilities.booking-history');
    Route::get('/residentfacilities/check-availability', [FacilityController::class, 'checkAvailability'])->name('resident.facilities.check-availability');
    Route::get('/residentfacilities/get-times/{id}', [FacilityController::class, 'getFacilityTimes'])->name('resident.facilities.get-times');
    Route::post('/resident/facilities/check-availability', [FacilityController::class, 'bookFacility'])->name('resident.facilities.check-availability');
  

});

// Admin Routes
Route::middleware(['auth', 'user-access:admin'])->prefix('admin')->group(function () {
    Route::get('/facilities', [FacilityController::class, 'index'])->name('admin.facilities.index');
    Route::get('/facilities/create', [FacilityController::class, 'create'])->name('admin.facilities.create');
    Route::post('/admin/facilities', [FacilityController::class, 'store'])->name('admin.facilities.store');
    Route::get('/facilities/{id}/edit', [FacilityController::class, 'edit'])->name('admin.facilities.edit');
    Route::put('/admin/facilities/{id}', [FacilityController::class, 'update'])->name('admin.facilities.update');
    Route::delete('/admin/facilities/{id}', [FacilityController::class, 'destroy'])->name('admin.facilities.destroy');
    
});

use App\Http\Controllers\ResidentAccountController;


Route::middleware(['auth', 'user-access:resident'])->group(function () {
    Route::get('/resident/home', [ResidentAccountController::class, 'showResidentHome'])->name('resident.home');
    Route::get('/resident/maintenance/payment-form', [ResidentAccountController::class, 'showResidentPaymentForm'])->name('maintenance.paymentForm');
    Route::post('/resident/maintenance/payment', [ResidentAccountController::class, 'storePayment'])->name('resident.maintenance.pay');
    Route::get('/resident/maintenance/payment', [ResidentAccountController::class, 'paymentstate'])->name('resident.maintenance.pay');
});



Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/resident-details', [ResidentAccountController::class, 'index'])->name('admin.resident.index');
    Route::get('/resident-details/{id}/edit', [ResidentAccountController::class, 'edit'])->name('admin.resident.edit');
    Route::put('/resident-details/{id}', [ResidentAccountController::class, 'update'])->name('admin.resident.update');
    Route::delete('/resident-details/{id}', [ResidentAccountController::class, 'destroy'])->name('admin.resident.destroy');

   
  
});


use App\Http\Controllers\MaintenanceChargeController;

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/maintenance', [MaintenanceChargeController::class, 'index'])->name('maintenance.index');
    Route::post('/admin/maintenance', [MaintenanceChargeController::class, 'store'])->name('maintenance.store');
    Route::put('/admin/maintenance/{maintenanceCharge}', [MaintenanceChargeController::class, 'update'])->name('maintenance.update');
    Route::delete('/admin/maintenance/{maintenanceCharge}', [MaintenanceChargeController::class, 'destroy'])->name('maintenance.destroy');
});





use App\Http\Controllers\Admin\ActivityController; // Correct namespace

Route::middleware(['auth', 'user-access:admin'])->prefix('admin')->group(function () {
    Route::get('activities', [ActivityController::class, 'index'])->name('admin.activities.index');
    Route::get('activities/create', [ActivityController::class, 'create'])->name('admin.activities.create');
    Route::post('activities', [ActivityController::class, 'store'])->name('admin.activities.store');
});


use App\Http\Controllers\DocumentController;

Route::get('/resident/documents', [DocumentController::class, 'index'])->name('resident.document.index');

// use App\Http\Controllers\HelpDeskController;

// Route::get('/resident/helpdesk', [HelpDeskController::class, 'index'])->name('resident.helpdesk.index');

use App\Http\Controllers\HelpDeskController;

Route::get('/resident/helpdesk', [HelpDeskController::class, 'index'])->name('resident.helpdesk.index');
// Route to handle the help desk form submission
Route::post('/helpdesk/submit', [HelpDeskController::class, 'store'])->name('submit.request');

// Route to display the form for creating a new help desk request
Route::get('/helpdesk/create', [HelpDeskController::class, 'create'])->name('submit.request.form');

// Route to show the edit form for a help desk request
Route::get('/requests/{id}/edit', [HelpDeskController::class, 'edit'])->name('requests.edit');

// Route to update a help desk request
Route::put('/requests/{id}', [HelpDeskController::class, 'update'])->name('requests.update');

// Route to delete a help desk request
Route::delete('/requests/{id}', [HelpDeskController::class, 'destroy'])->name('requests.destroy');


Route::get('/resident/moderate-forum', function () {
    return view('resident.moderate-forum.moderate-forum');
})->name('resident.moderate-forum.moderate-forum');
use App\Http\Controllers\ParkingSlotController;

Route::get('/admin/parking-slot', [ParkingSlotController::class, 'index'])->name('admin.parking-slot.index');

use App\Http\Controllers\StaffController;

Route::prefix('admin/staff')->name('admin.staff.')->group(function() {
    Route::get('/', [StaffController::class, 'index'])->name('view-staff');           // List staff
    Route::get('/create', [StaffController::class, 'create'])->name('create');       // Create form
    Route::post('/store', [StaffController::class, 'store'])->name('store');         // Store data
    Route::get('/{id}', [StaffController::class, 'show'])->name('show');             // Show staff
    Route::get('/{id}/edit', [StaffController::class, 'edit'])->name('edit');         // Edit form
    Route::put('/{id}', [StaffController::class, 'update'])->name('update');         // Update data
    Route::delete('/{id}', [StaffController::class, 'destroy'])->name('destroy');    // Delete data
});
use App\Http\Controllers\VendorController;

// Admin vendor routes with prefix and name
Route::prefix('admin/vendors')->name('admin.vendors.')->group(function () {
    Route::get('/', [VendorController::class, 'index'])->name('view-vendors');
    Route::get('create', [VendorController::class, 'create'])->name('create');
    Route::post('store', [VendorController::class, 'store'])->name('store');
    Route::get('edit/{vendor}', [VendorController::class, 'edit'])->name('edit');
    Route::put('update/{vendor}', [VendorController::class, 'update'])->name('update');
    Route::delete('destroy/{vendor}', [VendorController::class, 'destroy'])->name('destroy');
    Route::get('{vendor}', [VendorController::class, 'show'])->name('show'); // Route for viewing a vendor
});



// Display a listing of resident accounts
// Display a listing of resident accounts
Route::get('admin/resident_accounts', [App\Http\Controllers\ResidentAccountController::class, 'index'])->name('admin.resident_accounts.index');

// Show the form for creating a new resident account
Route::get('admin/resident_accounts/create', [App\Http\Controllers\ResidentAccountController::class, 'create'])->name('admin.resident_accounts.create');

// Store a newly created resident account in storage
Route::post('admin/resident_accounts', [App\Http\Controllers\ResidentAccountController::class, 'store'])->name('admin.resident_accounts.store');

// Show the form for editing a specific resident account
Route::get('admin/resident_accounts/{id}/edit', [App\Http\Controllers\ResidentAccountController::class, 'edit'])->name('admin.resident_accounts.edit');

// Update a specific resident account in storage
Route::put('admin/resident_accounts/{id}', [App\Http\Controllers\ResidentAccountController::class, 'update'])->name('admin.resident_accounts.update');

// Delete a specific resident account from storage
Route::delete('admin/resident_accounts/{id}', [App\Http\Controllers\ResidentAccountController::class, 'destroy'])->name('admin.resident_accounts.destroy');

Route::get('/admin/projects', function () {
    return view('admin.projects.projectmeeting');
})->name('admin.projects.projectmeeting');
Route::get('/admin/projects/createproject', function () {
    return view('admin.projects.createproject');
})->name('admin.projects.createproject');
Route::get('/admin/projects/createmeeting', function () {
    return view('admin.projects.createmeeting');
})->name('admin.projects.createmeeting');
Route::get('/admin/projects/task', function () {
    return view('admin.projects.task');
})->name('admin.projects.task');
Route::get('/admin/projects/addtask', function () {
    return view('admin.projects.addtask');
})->name('admin.projects.addtask');
Route::get('/admin/admin-files/resident-docs', function () {
    return view('admin.admin-files.resident-docs');
})->name('admin.admin-files.resident-docs');

// Route::get('/admin/parking-slot', [ParkingSlotController::class, 'index'])->name('admin.parking-slot.index');
// Route::get('/admin/parking-slot/vehicles', [ParkingSlotController::class, 'index'])->name('admin.parking-slot.manage-vehicles');
Route::get('/admin/parking-slot', function () {
    return view('admin.parking-slot.index');
})->name('admin.parking-slot.index');
Route::get('/admin/parking-slot/vehicles', function () {
    return view('admin.parking-slot.manage-vehicles');
})->name('admin.parking-slot.manage-vehicles');
Route::get('/admin/parking-slot/vehicles-data', function () {
    return view('admin.parking-slot.vehicles-data');
})->name('admin.parking-slot.vehicles-data');

use App\Http\Controllers\ResidentController;

Route::get('/resident/profile/{id}', [ResidentController::class, 'show'])->name('resident.profile');
Route::get('/resident/profile/test', [ResidentController::class, 'test'])->name('resident.profile.test');


Route::get('/resident/{id}', [ResidentController::class, 'show'])->name('resident.show');

use App\Http\Controllers\MaintenanceController;

Route::get('/maintenance-payment', [MaintenanceController::class, 'showPaymentForm'])->name('maintenance.paymentForm');
Route::post('/maintenance-payment', [MaintenanceController::class, 'processPayment'])->name('maintenance.processPayment');


use App\Http\Controllers\ProjectController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');
});

use App\Http\Controllers\ParkingController;

Route::resource('parking', ParkingController::class);

// Route for displaying the list of parking entries
Route::get('/admin/parking', [ParkingController::class, 'index'])->name('admin.parking.index');

// Route for displaying the create parking form
Route::get('/admin/parking/create', [ParkingController::class, 'create'])->name('admin.parking.create');
Route::get('/admin/parking/{parking}/edit', [ParkingController::class, 'edit'])->name('admin.parking.edit');
Route::get('/admin/parking/{parking}', [ParkingController::class, 'show'])->name('admin.parking.show');
Route::delete('/admin/parking/{parking}', [ParkingController::class, 'destroy'])->name('admin.parking.destroy');