//conditional shadows
const splitSections = document.querySelectorAll('.split_section');

splitSections.forEach(splitSection => {
if (splitSection.querySelector('.split_subsection')) {
    // If the split section has a split subsection child, disable the shadow for the split section and add the deep shadow for the split subsection.
    splitSection.style.boxShadow = 'none';
    splitSection.querySelector('.split_subsection').style.boxShadow = '0 12px 10px rgba(0, 0, 0, 0.2)';
    splitSection.querySelector('.split_subsection').style.gap = '30px';
} else {
    // Otherwise, add the deep shadow to the split section.
    splitSection.style.boxShadow = '0 12px 10px rgba(0, 0, 0, 0.2)';
}
});