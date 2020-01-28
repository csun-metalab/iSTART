import SlidesAPI from './../../../api/slides'

export default {
  // Enable Demo Mode
  setDemoMode ({ commit }) {
    commit('SET_DEMO_MODE')
  },

  // Module Functionality
  setModuleData ({ commit }, payload) {
    commit('SET_MODULE_DATA', payload)
  },

  async requestModuleProgress ({ commit }, payload) {
    let userId = payload.userId
    let userGroup = payload.userGroup
    let daysToRelease = payload.daysToRelease
    payload = { userId: userId, userGroup: userGroup }

    SlidesAPI.getModuleProgressAPI(payload)
      .then(
        response => {
          let conditions = {
            user_group: userGroup,
            days_to_release: parseInt(daysToRelease)
          }
          response.conditions = conditions
          commit('REQUEST_MODULE_PROGRESS', response)
        })
      .catch(
        error => {
          console.error(error)
        }
      )
      .finally(() => {
        commit('SET_INITIAL_DATA_LOAD', false)
      })
  },

  async setModuleProgress ({ commit }, payload) {
    SlidesAPI.setModuleProgressAPI(payload)
      .catch(
        error => {
          console.error(error)
        })
  },

  async completeModule ({ commit }, payload) {
    let index = payload.index
    SlidesAPI.moduleCompleteAPI(payload)
      .then(
        () => {
          commit('MARK_MODULE_AS_REVIEW', index)
        }
      )
      .catch(
        error => {
          console.error(error)
        })
  },

  markAllModulesAsReview ({ commit }) {
    commit('MARK_ALL_MODULES_AS_REVIEW')
  },

  setModuleIndex ({ commit }, payload) {
    commit('SET_MODULE_INDEX', payload)
  },

  setCurrentModule ({ commit }, payload) {
    commit('SET_CURRENT_MODULE', payload)
  },

  // Stores Specified Module Into State
  storeJSONInState ({ commit }, payload) {
    commit('STORE_JSON_IN_STATE', payload)
  },

  // Slide Navigation Functionality
  navigateFromSlide ({ commit }, payload) {
    commit('NAVIGATE_FROM_SLIDE', payload)
  },

  navigateToSlide ({ commit }, payload) {
    commit('NAVIGATE_TO_SLIDE', payload)
  },

  // Slide Navigation Button States
  resetSlideNavigation ({ commit }) {
    commit('RESET_SLIDE_NAVIGATION')
  },

  enableContinue ({ commit }) {
    commit('ENABLE_CONTINUE')
  },

  enableBack ({ commit }) {
    commit('ENABLE_BACK')
  },

  disableContinue ({ commit }) {
    commit('DISABLE_CONTINUE')
  },

  // Toggles If Slide is Displayed (true/false)
  setSlideContentVisibility ({ commit }, payload) {
    commit('SET_SLIDE_CONTENT_VISIBILITY', payload)
  },

  // Email Wellness Goal
  async emailWellnessGoal ({ commit }, payload) {
    commit('INITIATE_WELLNESS_GOAL_LOAD')
    return SlidesAPI.emailWellnessGoalAPI(payload)
      .then(
        () => {
          commit('WELLNESS_GOAL_EMAIL_WAS_SUBMITTED', true)
        })
      .catch(
        error => {
          console.error(error)
          commit('WELLNESS_GOAL_EMAIL_WAS_SUBMITTED', false)
        }
      )
  },

  // Card Flip Template
  updateCard ({ commit }, payload) {
    commit('UPDATE_CARD', payload)
  },

  checkCardFlips ({ commit }, payload) {
    commit('CHECK_CARD_FLIPS', payload)
  },

  // Input Comparison Template
  updateInputToResponded ({ commit }, payload) {
    commit('UPDATE_INPUT_TO_RESPONDED', payload)
  },

  updateInputValidity ({ commit }, payload) {
    commit('UPDATE_INPUT_VALIDITY', payload)
  },

  storeUserResponse ({ commit }, payload) {
    commit('STORE_USER_RESPONSE', payload)
  },

  // Quiz Template
  updateQuizResponse ({ commit }, payload) {
    commit('UPDATE_QUIZ_RESPONSE', payload)
  },

  // Multi Quiz Question Template
  updateMultiQuizInput ({ commit }, payload) {
    commit('UPDATE_MULTI_QUIZ_INPUT', payload)
  },

  showMultiQuizQuestion ({ commit }, payload) {
    commit('SHOW_MULTI_QUIZ_QUESTION', payload)
  },

  enableMultiQuizRedirect ({ commit }, payload) {
    commit('ENABLE_MULTI_QUIZ_REDIRECT', payload)
  },

  checkMultiQuizYesAndCriteria ({ commit }, payload) {
    commit('CHECK_MULTI_QUIZ_YES_AND_CRITERIA', payload)
  },

  checkMultiQuizNoAndCriteria ({ commit }, payload) {
    commit('CHECK_MULTI_QUIZ_NO_AND_CRITERIA', payload)
  },

  checkMultiQuizYesOrCriteria ({ commit }, payload) {
    commit('CHECK_MULTI_QUIZ_YES_OR_CRITERIA', payload)
  },

  checkMultiQuizNoOrCriteria ({ commit }, payload) {
    commit('CHECK_MULTI_QUIZ_NO_OR_CRITERIA', payload)
  },

  storeQuizResponses ({ commit }, payload) {
    commit('STORE_QUIZ_RESPONSES', payload)
  }
}
