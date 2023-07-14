class TimelineBlock {
  constructor () {
    this.timelineBlocks = document.querySelectorAll(
      '.timeline-block__entries'
    )
    if (this.timelineBlocks.length) {
      this.scrollToCurrentEntry()
    }

    this.timeLineEntryDetails = document.querySelectorAll('.timeline-entry__detail')
    if (this.timeLineEntryDetails.length) {
      this.detailToggle()
    }

    document.querySelectorAll('.timeline-block__entries').forEach(block => {
      block.querySelectorAll('[data-toggle-for]').forEach(element => {
        element.addEventListener('click', () => {
          let targetId = element.getAttribute('data-toggle-for');
          document.getElementById(targetId)?.click();
        });
      });
    });

  }

  scrollToCurrentEntry () {
    const pastEntries = this.TimelineBlocks[0].querySelectorAll('.timeline-entry--past')
    if (pastEntries) {
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
