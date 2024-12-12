declare const verticalData: { id: string; };

function getVerticalFromLocalStorage() {
    try {
        const urlPath = window.location.pathname;
        const pathSegments = urlPath.split('/');
        const name = pathSegments[2];
        const id = verticalData.id;

        localStorage.setItem('vb_vertical_id', id);
        localStorage.setItem('vb_vertical', name);
    } catch (error) {
        console.error("Failed:", error);
    }
}

document.addEventListener('DOMContentLoaded', getVerticalFromLocalStorage);