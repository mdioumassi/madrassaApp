<div class="w3-sidebar w3-bar-block bg-white mt-4" style="width:210px;">
    <a href="{{route('dashboard')}}" class="w3-bar-item w3-button">{{ _('Dashbord') }}</a>
    <button class="w3-button w3-block w3-left-align" onclick="myAccFunc()">
        {{_('Ulisateurs')}} <i class="fa fa-caret-down"></i>
    </button>
    <div id="demoAcc" class="w3-hide w3-white w3-card">
        <a href="{{route('admin.users.index')}}" class="w3-bar-item w3-button">{{_('Tous')}}</a>
        <a href="{{route('admin.parents.list')}}" class="w3-bar-item w3-button">{{_('Parents')}}</a>
        <a href="{{route('admin.students.list')}}" class="w3-bar-item w3-button">{{_('Adultes')}}</a>
        <a href="{{route('admin.teachers.list')}}" class="w3-bar-item w3-button">{{_('Professeurs')}}</a>
    </div>

    <div class="w3-dropdown-click">
        <button class="w3-button" onclick="myDropFunc()">
            Cours & Niveaux <i class="fa fa-caret-down"></i>
        </button>
        <div id="demoDrop" class="w3-dropdown-content w3-bar-block w3-white w3-card">
            <a href="{{route('admin.courses.select.levels.keyword', 'arabe-enfant')}}" class="w3-bar-item w3-button">{{_('Cours d\'arabe enfant')}}</a>
            <a href="{{route('admin.courses.select.levels.keyword', 'arabe-adulte')}}" class="w3-bar-item w3-button">{{_('Cours d\'arabe adulte')}}</a>
            <a href="{{route('admin.courses.select.levels.keyword', 'coran-enfant')}}" class="w3-bar-item w3-button">{{_('Cours de coran enfant')}}</a>
            <a href="{{route('admin.courses.select.levels.keyword', 'coran-adulte')}}" class="w3-bar-item w3-button">{{_('Cours de coran adulte')}}</a>
        </div>
    </div>
    <a href="#" class="w3-bar-item w3-button">Link 2</a>
    <a href="#" class="w3-bar-item w3-button">Link 3</a>
</div>
<script>
    function myAccFunc() {
        var x = document.getElementById("demoAcc");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
            x.previousElementSibling.className += " w3-green";
        } else {
            x.className = x.className.replace(" w3-show", "");
            x.previousElementSibling.className =
                x.previousElementSibling.className.replace(" w3-green", "");
        }
    }

    function myDropFunc() {
        var x = document.getElementById("demoDrop");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
            x.previousElementSibling.className += " w3-green";
        } else {
            x.className = x.className.replace(" w3-show", "");
            x.previousElementSibling.className =
                x.previousElementSibling.className.replace(" w3-green", "");
        }
    }
</script>
