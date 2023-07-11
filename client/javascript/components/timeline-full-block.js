class TimelineBlock {
  constructor () {
    this.timeLineFullBlocks = document.querySelectorAll(
      '.timeline-full-block__entries'
    )
    this.timeLineEntryDetails = document.querySelectorAll('.timeline-entry__detail')
    if (this.timeLineFullBlocks.length) {
      this.scrollToCurrentEntry()
    }
    if (this.timeLineEntryDetails.length) {
      this.detailToggle()
    }
  }

  scrollToCurrentEntry () {
    const pastEntries = this.timeLineFullBlocks[0].querySelectorAll('.timeline-entry--past')
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
