@extends('layout.app', ['class' => 'register-page'])

@section('content')
    @include('layout.navbar')

    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Registered Companies
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Name</th>
                                        <th>URL for Logo</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>Andrew Mike</td>
                                        <td>Develop</td>
                                        <td class="td-actions text-right">
                                            <button 
                                                type="button" 
                                                rel="tooltip" 
                                                class="btn btn-info btn-icon btn-sm " 
                                                data-original-title="" 
                                                data-toggle="tooltip" 
                                                data-placement="left" 
                                                title="Edit Company" 
                                            >
                                                <i class="ni ni-zoom-split-in pt-1"></i>
                                            </button>
                                            <button 
                                                    type="button" 
                                                    rel="tooltip" 
                                                    class="btn btn-danger btn-icon btn-sm " 
                                                    data-original-title=""
                                                    data-toggle="tooltip" 
                                                    data-placement="right" 
                                                    title="Delete Company" 
                                                >
                                                <i class="ni ni-fat-remove pt-1"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <nav aria-label="...">
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">
                                            <i class="fa fa-angle-left"></i>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            <i class="fa fa-angle-right"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <form action="" method="post" class="card-body pt-4 pb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="company_logo">Company Name</label>
                                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="company_logo">Select Logo</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="company_logo" lang="en">
                                            <label class="custom-file-label" for="company_logo"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 pt-4">
                                    <button class="btn btn-success mt-2">
                                        Create Company
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total traffic</h5>
                                    <span class="h2 font-weight-bold mb-0">350,897</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                        <i class="ni ni-active-40"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Suggestions
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>User Name</th>
                                        <th>Suggestion</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>Andrew Mike</td>
                                        <td>Develop</td>
                                        <td class="td-actions text-right">
                                            <button 
                                                type="button" 
                                                rel="tooltip" 
                                                class="btn btn-success btn-icon btn-sm " 
                                                data-original-title="" 
                                                data-toggle="tooltip" 
                                                data-placement="left" 
                                                title="Publish Suggestion" 
                                            >
                                                <i class="ni ni-send pt-1"></i>
                                            </button>
                                            <button 
                                                    type="button" 
                                                    rel="tooltip" 
                                                    class="btn btn-danger btn-icon btn-sm " 
                                                    data-original-title=""
                                                    data-toggle="tooltip" 
                                                    data-placement="right" 
                                                    title="Discard Suggestion" 
                                                >
                                                <i class="ni ni-fat-remove pt-1"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <nav aria-label="...">
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">
                                            <i class="fa fa-angle-left"></i>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            <i class="fa fa-angle-right"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Feedback Received
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>User Name</th>
                                        <th>Feedback Body</th>
                                        <th>Calification</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>Andrew Mike</td>
                                        <td>Develop</td>
                                        <td>10/10</td>
                                        <td class="td-actions text-right">
                                            <button 
                                                type="button" 
                                                rel="tooltip" 
                                                class="btn btn-success btn-icon btn-sm " 
                                                data-original-title="" 
                                                data-toggle="tooltip" 
                                                data-placement="left" 
                                                title="Publish Feedback" 
                                            >
                                                <i class="ni ni-send pt-1"></i>
                                            </button>
                                            <button 
                                                    type="button" 
                                                    rel="tooltip" 
                                                    class="btn btn-danger btn-icon btn-sm " 
                                                    data-original-title=""
                                                    data-toggle="tooltip" 
                                                    data-placement="right" 
                                                    title="Discard Feedback" 
                                                >
                                                <i class="ni ni-fat-remove pt-1"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <nav aria-label="...">
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">
                                            <i class="fa fa-angle-left"></i>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            <i class="fa fa-angle-right"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection