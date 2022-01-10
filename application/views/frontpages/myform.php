<div class="container my-5">
    <div class="row">
        <div class="col-12 mt-4 mb-3">
            <h2 class="mb-3 text-center">Please Fill Us The Required Details</h2>
        </div>
    </div>
    <div class="row justify-content-around">
        <div class="col-8">
            <form action="<?=base_url('Myform')?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-4 text-right mt-2">
                        <div class="field-label">Project Type</div>
                    </div>
                    <div class="col-8">
                        <div class="field-input mt-2">
                            <input type="radio" name="project_type" required value="exterior" id="exterior"> <label for="exterior">Exterior</label> 
                            <input type="radio" name="project_type" required value="interior" id="interior" class="ml-2"> <label for="interior">Interior</label> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 text-right mt-2">
                        <div class="field-label">Looking For</div>
                    </div>
                    <div class="col-8">
                        <div class="field-input mt-2">
                            <input type="radio" name="looking_for" value="3D" required id="3D"> <label for="3D">3D</label> 
                            <input type="radio" name="looking_for" value="2D" required id="2D" class="ml-2"> <label for="2D">2D</label> 
                            <input type="radio" name="looking_for" value="3D Walkthrough" required id="3D_walkthrough" class="ml-2"> <label for="3D_walkthrough">3D Walkthrough</label> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 text-right mt-2">
                        <div class="field-label">Project Description</div>
                    </div>
                    <div class="col-8">
                        <div class="field-input mt-2">
                            <textarea name="pro_description" id="" required cols="30" rows="4" placeholder="Describe your project like Residential/Office/Restaurant ETC" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 text-right mt-2">
                        <div class="field-label">Expected Budget</div>
                    </div>
                    <div class="col-8">
                        <div class="field-input mt-2">
                            <input name="budget" required placeholder="We can create a design by keeping your budget in our view" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 text-right mt-2">
                        <div class="field-label">Select One</div>
                    </div>
                    <div class="col-8">
                        <div class="field-input mt-2">
                            <input type="radio" name="project" required value="ongoing_work" id="ongoing_work"> <label for="ongoing_work">Ongoing Work</label> 
                            <input type="radio" name="project" required value="about_to_start" id="about_to_start" class="ml-2"> <label for="about_to_start">About To Start</label> 
                            <input type="radio" name="project" required value="face_over" id="face_over" class="ml-2"> <label for="face_over">Face Over</label> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 text-right mt-2">
                        <div class="field-label">Message</div>
                    </div>
                    <div class="col-8">
                        <div class="field-input mt-2">
                            <textarea name="message" id="" cols="30" rows="8" placeholder="Give your view which you like ex: comfort/rug/posh etc, which style you like modern , contemporary, etc." class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 text-right mt-2">
                        <div class="field-label">Anything More About Project</div>
                    </div>
                    <div class="col-8">
                        <div class="field-input mt-2">
                            <textarea name="pro_more" id="" cols="30" rows="8" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 text-right mt-2">
                        <div class="field-label">Referral Code</div>
                    </div>
                    <div class="col-8">
                        <div class="field-input mt-2">
                            <input name="ref_code" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 text-right mt-2">
                        <div class="field-label">Executive Code</div>
                    </div>
                    <div class="col-8">
                        <div class="field-input mt-2">
                            <input name="ex_code" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 text-right mt-2">
                        <div class="field-label">Upload Your Files</div>
                    </div>
                    <div class="col-8">
                        <div class="field-input mt-2">
                            <input type="file" name="file[]" multiple> 
                        </div>
                        <p style="font-size:12px" class="font-italic">Upload ur files in JPEG, PDF and upload limit is 25mb if files exceeds limit pls mail us ur files or google drive link by creating a subject of ur application number which will be generated after u submitting this form and also u can check ur application number in ur my account</p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-3 text-center">
                        <button class="btn-one" name="SubmitForm">Submit<span class="flaticon-next"></span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>