<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<form method="post" action="{{ route('user.portfolio.url.update', $user->id) }}" id="frmStoreUserPortfolioUrls" class="frmStore">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="mainModalLabel">Links</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <p class="text-muted" style="color:#6cb2eb!important">Add links to your portfolio, interviews, news articles or press releases, etc. Be creative. What do you want your potential buyers to see?
            </p>
        <label for="user-website" class="col-form-label">Your Links:</label>
        <div class="url_container">
 <ul id="sortable" class="url_container1" style="list-style-type:none;">           
            @foreach ($user_portfolio_urls as $p_url)
            <li>
            <input type="hidden" name="portfolio_url[position][]" id="position" value="{{$p_url->position}}">             
                <div class="card mb-3">
                    <div class="card-body">

                  <div class="row">
                        <div class="col">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text my-handle"><i class="fas fa-align-justify"></i></span>                                   
                                </div>
                                 <input type="text" class="form-control" placeholder="Enter Title" aria-label="Enter Url" aria-describedby="basic-addon2" name="portfolio_url[title][]" value="{{$p_url->title}}" maxlength="35" required>
                                 <input type="text" class="form-control" placeholder="yourwebsite.com" aria-label="Enter Url" aria-describedby="basic-addon2" name="portfolio_url[url][]" value="{{$p_url->url}}" required>
                                <div class="input-group-append">
                                <button class="btn btn-danger removePortfolioUrl" type="button"><i class="fas fa-trash"></i></button>
                                
                            </div>
                            </div>
                             
                        </div>
                        
                    </div>

                       {{-- <i class="fas fa-align-justify"></i>
                        <div class="input-group mb-3">
                            <div class="link-title-instruction">Title : </div>
                            <input type="text" class="form-control" placeholder="Enter Title" aria-label="Enter Url" aria-describedby="basic-addon2" name="portfolio_url[title][]" value="{{$p_url->title}}" maxlength="35" required>
                            <span class="error_input portfolio_url_error text-danger"></span>
                        </div>
                        <div class="input-group mb-3">
                            <div class="link-website-instruction">https://www.</div>
                            <input type="text" class="form-control" placeholder="yourwebsite.com" aria-label="Enter Url" aria-describedby="basic-addon2" name="portfolio_url[url][]" value="{{$p_url->url}}" required>
                            <span class="error_input portfolio_url_error text-danger"></span>
                        </div>
                        <div class="row">
                            <div class="col-md-12 ">
                                <button class="btn btn-danger float-right removePortfolioUrl" type="button"><i class="fas fa-trash"></i> Remove Item</button>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="float-right">
                    <a href="javascript:void(0)" class="addPortfolioUrl"><i class="fas fa-plus"></i> Add Link</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="submitModalForm" class="btn btn-primary">Update</button>
    </div>
</form>
