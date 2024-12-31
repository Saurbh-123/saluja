@extends('layouts.dashboard')
@section('content')

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <!-- Include jQuery and DataTables JS -->
    <style>
        /* Ensure the dropdown items have proper spacing and visibility */
        .dropdown-item {
            padding: 10px;
            font-size: 14px;
        }

        .dropdown-item.text-danger {
            color: #dc3545;
            /* Danger color for Delete */
        }
    </style>


    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Tables </span>
            </h4>
            <div class="card">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-header">Salesman Table</h5>
                    <div class="me-3">
                        <a href="{{ route('salesman.create') }}" class="btn rounded-pill btn-primary">
                            <span class="tf-icons bx bx-message-square-add"></span>&nbsp; Create Salesman
                        </a>
                    </div>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered" id="contact-table">
                        <thead>
                            <tr>
                                <th>#</th>
                               
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Created by</th>
                                <th>On</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                 
                        <tfoot>
                            <tr>
                                <th>#</th>
                             
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Created by</th>
                                <th>On</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>

@section('script')
    <script>
        $(document).ready(function() {
            // Check if the DataTable has already been initialized
            if (!$.fn.DataTable.isDataTable('#contact-table')) {
                $('#contact-table').DataTable({
                    "paging": true,
                    "searching": true,
                    "info": true
                });
            }
        });

        document.addEventListener('DOMContentLoaded', () => {
            const dropdownButtons = document.querySelectorAll('.dropdown-toggle');

            dropdownButtons.forEach(button => {
                button.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const dropdownMenu = button.nextElementSibling;
                    dropdownMenu.classList.toggle('show');
                });
            });
        });
    </script>
@endsection


@endsection
