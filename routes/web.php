<?php

use App\Http\Controllers\Backend\AttendenceController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\EmployeeSalaryController;
use App\Http\Controllers\Backend\PaySalaryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// User
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/logout', [UserController::class, 'admin_logout'])->name('admin.logout');
    Route::get('/admin/logout/page', [UserController::class, 'admin_logout_page']);
    Route::get('/admin/profile', [UserController::class, 'admin_profile'])->name('admin.profile');
    Route::post('/update/profile/info', [UserController::class, 'update_info'])->name('update.info');
    Route::post('/update/profile/password', [UserController::class, 'update_password'])->name('update.password');
});


// Employee
Route::middleware(['auth'])->group(function () {
    Route::get('/employee', [EmployeeController::class, 'employee'])->name('employee');
    Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/employee/show/{id}', [EmployeeController::class, 'show'])->name('employee.show');
    Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::post('/employee/update', [EmployeeController::class, 'update'])->name('employee.update');
    Route::get('/employee/delete/{id}', [EmployeeController::class, 'destroy'])->name('employee.delete');
});



// Customer
Route::middleware(['auth'])->group(function () {
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/customer', 'customer')->name('customer');
        Route::get('/customer/create',  'create')->name('customer.create');
        Route::post('/customer/store',  'store')->name('customer.store');
        Route::get('/customer/show/{id}',  'show')->name('customer.show');
        Route::get('/customer/edit/{id}',  'edit')->name('customer.edit');
        Route::post('/customer/update',  'update')->name('customer.update');
        Route::get('/customer/delete/{id}',  'destroy')->name('customer.delete');
    });
});



// Supplier
Route::middleware(['auth'])->group(function () {
    Route::controller(SupplierController::class)->group(function () {
        Route::get('/supplier', 'supplier')->name('supplier');
        Route::get('/supplier/create',  'create')->name('supplier.create');
        Route::post('/supplier/store',  'store')->name('supplier.store');
        Route::get('/supplier/show/{id}',  'show')->name('supplier.show');
        Route::get('/supplier/edit/{id}',  'edit')->name('supplier.edit');
        Route::post('/supplier/update',  'update')->name('supplier.update');
        Route::get('/supplier/delete/{id}',  'destroy')->name('supplier.delete');
    });
});



// Advance Salary
Route::middleware(['auth'])->group(function () {
    Route::controller(EmployeeSalaryController::class)->group(function () {
        Route::get('/advance/salary', 'salary')->name('advance.salary');
        Route::get('/advance/salary/create',  'create')->name('advance.salary.create');
        Route::post('/advance/salary/store',  'store')->name('advance.salary.store');
        Route::get('/advance/salary/edit/{id}',  'edit')->name('edit.advance.salary');
        Route::post('/advance/salary/update',  'update')->name('advance.salary.update');
        Route::get('/advance/salary/delete/{id}',  'destroy')->name('delete.advance.salary');
    });
});


// Pay Salary
Route::middleware(['auth'])->group(function () {
    Route::controller(PaySalaryController::class)->group(function () {
        Route::get('/pay/salary', 'index')->name('pay.salary');
        Route::get('/pay/now/{id}', 'create')->name('pay.now');
        Route::post('/pay/salary/store', 'store')->name('pay.salary.store');
        Route::get('/last/month/salary/', 'last_month_salary')->name('month.salary');
    });
});



// Attendence
Route::middleware(['auth'])->group(function () {
    Route::controller(AttendenceController::class)->group(function () {
        Route::get('/attendence', 'index')->name('attendence');
        Route::get('/attendence/create', 'create')->name('attendence.create');
        Route::post('/attendence/store', 'store')->name('attendence.store');
        Route::get('/attendence/edit/{date}', 'edit')->name('attendence.edit');
        Route::post('/attendence/update', 'update')->name('attendence.update');
        Route::get('/attendence/view/{date}', 'view')->name('attendence.view');
    });
});


// Category
Route::middleware(['auth'])->group(function () {
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index')->name('category');
        Route::get('/category/create', 'create')->name('category.create');
        Route::post('/category/store', 'store')->name('category.store');
        Route::get('/category/edit/{id}', 'edit')->name('category.edit');
        Route::post('/category/update', 'update')->name('category.update');
        Route::get('/category/delete/{id}', 'destroy')->name('category.delete');
    });
});


// Product
Route::middleware(['auth'])->group(function () {
    Route::controller(ProductController::class)->group(function () {
        Route::get('/product', 'index')->name('product');
        Route::get('/product/create', 'create')->name('product.create');
        Route::post('/product/store', 'store')->name('product.store');
        Route::get('/product/edit/{id}', 'edit')->name('product.edit');
        Route::post('/product/update', 'update')->name('product.update');
        Route::get('/product/delete/{id}', 'destroy')->name('product.delete');

        Route::get('/product/barcode/{id}', 'code')->name('product.barcode');

        Route::get('/product/import', 'import')->name('product.import');
        Route::post('/product/import/store', 'import_store')->name('import.store');

        Route::get('/product/export', 'export')->name('product.export');
    });
});
