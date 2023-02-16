var tooltipTriggerList = [].slice.call($('[data-bs-toggle="tooltip"]'));

var tooltipList = tooltipTriggerList.map((tooltipTriggerEl) => {
    return new bootstrap.Tooltip(tooltipTriggerEl)
});