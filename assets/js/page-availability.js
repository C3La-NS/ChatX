    //localStorage.clear();
    manage_crash();

    //Create a windows ID for each windows that is oppened
    var current_window_id = Date.now() + "";//convert to string
    var time_period = 2000;//ms

    //Check to see if PageVisibility API is supported or not
    var PV_API = page_visibility_API_check();

    /************************
    ** PAGE VISIBILITY API **
    *************************/
    function page_visibility_API_check ()
    {
        var page_visibility_API = false;
        var visibility_change_handler = false;
        if ('hidden' in document)
        {
            page_visibility_API = 'hidden';
            visibility_change_handler = 'visibilitychange';
        }
        else
        {
            var prefixes = ['webkit','moz','ms','o'];
            //loop over all the known prefixes
            for (var i = 0; i < prefixes.length; i++){
                if ((prefixes[i] + 'Hidden') in document)
                {
                    page_visibility_API = prefixes[i] + 'Hidden';
                    visibility_change_handler = prefixes[i] + 'visibilitychange';
                }
            }
        }

        if (!page_visibility_API)
        {
            //PageVisibility API is not supported in this device
            return page_visibility_API;
        }

        return {"hidden": page_visibility_API, "handler": visibility_change_handler};
    }

    if (PV_API)
    {
        document.addEventListener(PV_API.handler, function(){
            //console.log("current_window_id", current_window_id, "document[PV_API.hidden]", document[PV_API.hidden]);
            if (document[PV_API.hidden])
            {
                //windows is hidden now
                remove_from_active_windows(current_window_id);
                //skip_once = true;
            }
            else
            {
                //windows is visible now
                //add_to_active_windows(current_window_id);
                //skip_once = false;
                //check_current_window_status ();
            }
        }, false);
    }

    /********************************************
    ** ADD CURRENT WINDOW TO main_windows LIST **
    *********************************************/
    add_to_main_windows_list(current_window_id);
    //update active_window to current window
    localStorage.active_window = current_window_id;

    /**************************************************************************
    ** REMOVE CURRENT WINDOWS FROM THE main_windows LIST ON CLOSE OR REFRESH **
    ***************************************************************************/
    window.addEventListener('beforeunload', function ()
    {
        remove_from_main_windows_list(current_window_id);
    });

    /*****************************
    ** ADD TO main_windows LIST **
    ******************************/
    function add_to_main_windows_list(window_id)
    {
        var temp_main_windows_list = get_main_windows_list();
        var index = temp_main_windows_list.indexOf(window_id);

        if (index < 0)
        {
            //this windows is not in the list currently
            temp_main_windows_list.push(window_id);
        }

        localStorage.main_windows = temp_main_windows_list.join(",");

        return temp_main_windows_list;
    }

    /**************************
    ** GET main_windows LIST **
    ***************************/
    function get_main_windows_list()
    {
        var temp_main_windows_list = [];
        if (localStorage.main_windows)
        {
            temp_main_windows_list = (localStorage.main_windows).split(",");
        }

        return temp_main_windows_list;
    }

    /**********************************************
    ** REMOVE WINDOWS FROM THE main_windows LIST **
    ***********************************************/
    function remove_from_main_windows_list(window_id)
    {
        var temp_main_windows_list = [];
        if (localStorage.main_windows)
        {
            temp_main_windows_list = (localStorage.main_windows).split(",");
        }

        var index = temp_main_windows_list.indexOf(window_id);
        if (index > -1) {
            temp_main_windows_list.splice(index, 1);
        }

        localStorage.main_windows = temp_main_windows_list.join(",");

        //remove from active windows too
        remove_from_active_windows(window_id);

        return temp_main_windows_list;
    }

    /**************************
    ** GET active_windows LIST **
    ***************************/
    function get_active_windows_list()
    {
        var temp_active_windows_list = [];
        if (localStorage.actived_windows)
        {
            temp_active_windows_list = (localStorage.actived_windows).split(",");
        }

        return temp_active_windows_list;
    }

    /*************************************
    ** REMOVE FROM actived_windows LIST **
    **************************************/
    function remove_from_active_windows(window_id)
    {
        var temp_active_windows_list = get_active_windows_list();

        var index = temp_active_windows_list.indexOf(window_id);
        if (index > -1) {
            temp_active_windows_list.splice(index, 1);
        }

        localStorage.actived_windows = temp_active_windows_list.join(",");

        return temp_active_windows_list;
    }

    /********************************
    ** ADD TO actived_windows LIST **
    *********************************/
    function add_to_active_windows(window_id)
    {
        var temp_active_windows_list = get_active_windows_list();

        var index = temp_active_windows_list.indexOf(window_id);

        if (index < 0)
        {
            //this windows is not in active list currently
            temp_active_windows_list.push(window_id);
        }

        localStorage.actived_windows = temp_active_windows_list.join(",");

        return temp_active_windows_list;
    }

    /*****************
    ** MANAGE CRASH **
    ******************/
    //If the last update didn't happened recently (more than time_period*2)
    //we will clear saved localStorage's data and reload the page
    function manage_crash()
    {
        if (localStorage.last_update)
        {
            if (parseInt(localStorage.last_update) + (time_period * 2) < Date.now())
            {
                //seems a crash came! who knows!?
                //localStorage.clear();
                localStorage.removeItem('main_windows');
                localStorage.removeItem('actived_windows');
                localStorage.removeItem('active_window');
                localStorage.removeItem('last_update');
                location.reload();
            }
        }
    }