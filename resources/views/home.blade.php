@include('layouts.head')
@include('layouts.unesp_header')
@include('layouts.header')
<!-- Home content  -->
        <main>
            <div class=" head-filtros">
                <div class="row">
                    <div class="col-12">
                        <small><em>Use um dos filtros abaixo</em></small>
                    </div>
                </div>
            </div>
            <div class="box-filtros">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="content-filters">
                                <div class="row">
                                    <div class="col-6">
                                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>

                                        <button type="button" class="btn btn-light">filtrar</button>
                                    </div>
                                    <div class="col-6"> 
                                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>

                                        <button type="button" class="btn btn-light">filtrar</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                        <button type="button" class="btn btn-light">filtrar</button>
                                    </div>
                                    <div class="col-6">
                                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>

                                        <button type="button" class="btn btn-light">filtrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <div class=" head-metas">
                <div class="row">
                    <div class="col-12">
                        <small><em>Ver todas as metas</em></small>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="tab-content" style="display: none">
                            @foreach ($navmenu as $key => $mn )
                                <div class="tab-pane {{$mn['item_class']}}" id="{{$mn['tab']}}" role="{{$mn['role']}}" aria-labelledby="{{$mn['tab']}}-tab">
                                    <div class="card">
                                        <div class="card-header border-0">
                                            <div class="meta-id">
                                                <span>meta</span>
                                                <span>{{$key}}</span>
                                            </div>
                                            <div class="meta-descricao">
                                                <p>Special title treatment</p>
                                            </div>
                                            <div class="meta-buttons">
                                                <a href="#" class="btn btn-secondary"><i class="bi bi-pie-chart-fill"></i></a>
                                                <a href="#" class="btn btn-primary"><i class="bi bi-bell-fill"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body border-0">
                                          <h5 class="card-title">Special title treatment</h5>
                                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                          
                                        </div>
                                        <div class="card-footer text-muted">
                                          2 days ago
                                        </div>
                                      </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- #end Homr content  -->
@include('layouts.footer')