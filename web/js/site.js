function toggleCollapse() {
    $('#sidebar').toggleClass('active');
    $('#content').toggleClass('sidebar-collapsed');
}

function watchScreenResize() {
    if (window.matchMedia("(min-width:800px)").matches) {
        $('#sidebar').toggleClass('active', false);
        $('#content').toggleClass('sidebar-collapsed', false);
    } else {
        $('#sidebar').toggleClass('active', true);
        $('#content').toggleClass('sidebar-collapsed', true);
    }
}

window.onresize = watchScreenResize;

watchScreenResize();

$('#sidebarCollapse').on('click', toggleCollapse);