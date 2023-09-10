const TimelineBlock = {
  timelineBlocks: null,
  timeLineEntryDetails: null,
  init: function () {
    // set basics
    this.timelineBlocks = document.querySelectorAll('.timeline-block__entries')
    this.timeLineEntryDetails = document.querySelectorAll(
      '.timeline-entry__detail'
    )
    // scroll to today
    if (this.timelineBlocks.length) {
      this.detailToggle()
      // this.scrollToCurrentEntry()
      this.setHeight()
      this.setPrint()
    }

    if (this.timeLineEntryDetails.length) {
      this.addTogglesForCarousel()
    }
  },

  scrollToCurrentEntry: function () {
    const pastEntries = this.timelineBlocks[0].querySelectorAll(
      '.timeline-entry--past'
    )
    const futureEntries = this.timelineBlocks[0].querySelectorAll(
      '.timeline-entry--future'
    )
    if (
      pastEntries &&
      pastEntries.length &&
      futureEntries &&
      futureEntries.length
    ) {
      const rect = pastEntries[0].getBoundingClientRect()
      const top = rect.top + document.body.scrollTop
      window.scrollTo(0, top)
    }
  },

  detailToggle: function () {
    this.timeLineEntryDetails.forEach(detail => {
      detail.addEventListener('toggle', () => {
        detail.parentElement.classList.toggle('timeline-entry--open')
      })
    })
  },

  setHeight: function () {
    this.timelineBlocks.forEach(block => {
      const resizeObserver = new ResizeObserver(() => {
        const entriesHeight = block.offsetHeight

        let styleElement = document.getElementById('dynamicStyle')

        if (!styleElement) {
          styleElement = document.createElement('style')
          styleElement.id = 'dynamicStyle'
          document.head.appendChild(styleElement)
        }

        styleElement.innerHTML = `
          .timeline-entry--past:after,
          .timeline-entry--past:before {
            height: ${entriesHeight}px !important;
          }
        `
      })

      resizeObserver.observe(block)
    })
  },

  addTogglesForCarousel: function () {
    // add toggles for carousels

    this.timelineBlocks.forEach(block => {
      // console.log('found block')
      block.querySelectorAll('[data-toggle-for]').forEach(element => {
        element.classList.add('cursor-pointer')
        element.addEventListener('click', event => {
          // console.log('click')
          event.preventDefault()
          const targetId = element.getAttribute('data-toggle-for')
          const details = document.getElementById(targetId)
          if (details) {
            details.open = !details.open
          }
          return false
        })
      })
    })
  },
  setPrint: function () {
    window.onbeforeprint = () => {
      document.querySelectorAll('details').forEach(detail => {
        detail.setAttribute('open', '')
      })
    }

    window.onafterprint = () => {
      document.querySelectorAll('details').forEach(detail => {
        detail.removeAttribute('open')
      })
    }
  }
}

export default TimelineBlock
