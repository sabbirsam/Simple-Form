<div class="qbf_tabs">
    <div class="tab-content">
        <div id="sectionB" class="tab-pane fade">
            <div class="checkbox">
                <label class="checkbox-wrapper">
                    <span class="">
                        <button class="js-open-modal saveData" id="saveData" type="button">Save</button>
                    </span>
                </label>
            </div>
            <h2><?php _e("Build template","simple_form");?></h2>
            <div class="row">
                <div class="col-md-8">
                    <div class="saveDataWrap create_field_save_btn">
                        <input id="form_name" class="form-name" name="form_name" placeholder="Form name" type="text"
                            AUTOCOMPLETE=OFF />
                    </div>
                </div>
            </div>
            <hr />
            <form action="" id="form-builder-pages" data-url="<?php echo admin_url('admin-ajax.php')?> ">
                <ul id="tabs">
                    <li><a href="#page-1"><?php _e("Page 1","simple_form");?></a></li>
                    <li id="add-page-tab"><a href="#new-page"><?php _e("+ Page","simple_form");?></a></li>
                </ul>
                <div id="page-1" class="fb-editor"></div>
                <div id="new-page"></div>
            </form>
        </div>
    </div>
</div>
<div id="overlay"></div>