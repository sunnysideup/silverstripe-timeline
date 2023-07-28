class TimelineBlock {
  constructor () {
    console.log('TimelineBlock');

    // set basics
    this.timelineBlocks = document.querySelectorAll(
      '.timeline-block__entries'
    )
    this.timeLineEntryDetails = document.querySelectorAll('.timeline-entry__detail')

    // add toggles for carousels

    document.querySelectorAll('.timeline-block__entries').forEach(block => {
      console.log('found block');
      block.querySelectorAll('[data-toggle-for]').forEach(element => {
        element.classList.add('cursor-pointer');
        element.addEventListener('click', (event) => {
          console.log('click');
          event.preventDefault();
          const targetId = element.getAttribute('data-toggle-for');
          const details = document.getElementById(targetId);
          if(details) {
            details.open = !details.open;
          }
          return false;
        });
      });
    });

    if (this.timeLineEntryDetails.length) {
      this.detailToggle()
    }

    // scroll to today
    if (this.timelineBlocks.length) {
      this.scrollToCurrentEntry()
    }

  }

  scrollToCurrentEntry () {
    const pastEntries = this.timelineBlocks[0].querySelectorAll('.timeline-entry--past');
    const futureEntries = this.timelineBlocks[0].querySelectorAll('.timeline-entry--future');
    if (pastEntries && pastEntries.length && futureEntries && futureEntries.length) {
      const rect = pastEntries[0].getBoundingClientRect()
      const top = rect.top + document.body.scrollTop
      window.scrollTo(0, top)
    }
  }

  detailToggle () {
    this.timeLineEntryDetails.forEach(detail => {
      detail.addEventListener('toggle', () => {
        detail.parentElement.classList.toggle('timeline-entry--open')
      })
    })
  }


}
export default TimelineBlock
