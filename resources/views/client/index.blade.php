@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Create Ticket
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ticket</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">ID Clients</label>
                                <select disabled name="" id="" class="form-control">
                                    <option value="">01/Client/AKT</option>
                                </select>
                              </div>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Date</label>
                              <input type="date" class="form-control" id="date">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Description</label>
                              <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                            </div>
                          </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Draft</button>
                        <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <table class="mt-2 table-striped table-hover table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">No Ticket</th>
                    <th scope="col">ID Client</th>
                    <th scope="col">Date</th>
                    {{-- <th scope="col">Description</th> --}}

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>01/Ticket/IV/24</td>
                    <td>01/Client/AKT</td>
                    <td>21/01/2024</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>02/Ticket/IV/24</td>
                    <td>02/Client/AKT</td>
                    <td>21/01/2024</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>03/Ticket/IV/24</td>
                    <td>01/Client/AKT</td>
                    <td>21/01/2024</td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>04/Ticket/IV/24</td>
                    <td>05/Client/AKT</td>
                    <td>21/01/2024</td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>04/Ticket/IV/24</td>
                    <td>05/Client/AKT</td>
                    <td>21/01/2024</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
