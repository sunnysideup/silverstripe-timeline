import TimelineBlock from './javascript/components/timeline-block'

console.log('DOM fully loaded and parsed')
window.addEventListener('DOMContentLoaded', event => {
  console.log('DOM fully loaded and parsed')
  TimelineBlock.init()
})
