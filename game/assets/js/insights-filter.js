(function () {
  const insightFilterState = {
    category: '',
    sector: '',
    topic: ''
  };

  const filterTypes = Object.keys(insightFilterState);

  const initInsightsFilter = () => {
    document.querySelectorAll('.filter-row').forEach(row => {
      row.addEventListener('click', () => toggleFilter(row));
    });

    document.querySelectorAll('.filter-option[data-filter-type]').forEach(option => {
      option.addEventListener('click', () => {
        applyFilter(option.dataset.filterType, option.dataset.value || '');
      });
    });

    const searchInput = document.getElementById('insightSearch');
    if (searchInput) {
      searchInput.addEventListener('input', filterInsights);
    }

    const resetButton = document.querySelector('.filter-reset');
    if (resetButton) {
      resetButton.addEventListener('click', resetFilters);
    }

    updateFilterLabels();
    updateActiveFilterOptions();
    filterInsights();
  };

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initInsightsFilter);
  } else {
    initInsightsFilter();
  }

  function toggleFilter(element) {
    const group = element.parentElement;
    const content = group.querySelector('.filter-content');
    const icon = element.querySelector('.icon');

    document.querySelectorAll('.filter-group').forEach(other => {
      if (other !== group) {
        other.querySelector('.filter-content').style.maxHeight = '0px';
        other.querySelector('.icon').style.transform = 'rotate(0deg)';
      }
    });

    const isOpen = (parseFloat(content.style.maxHeight) || 0) > 0;

    if (isOpen) {
      content.style.maxHeight = '0px';
      icon.style.transform = 'rotate(0deg)';
    } else {
      content.style.maxHeight = content.scrollHeight + 'px';
      icon.style.transform = 'rotate(180deg)';
    }
  }

  function cardHasTerm(card, type) {
    const filterValue = insightFilterState[type];
    const cardValues = (card.dataset[type] || '').split(/\s+/).filter(Boolean);

    return !filterValue || cardValues.includes(filterValue);
  }

  function matchesFilters(card) {
    const searchInput = document.getElementById('insightSearch');
    const searchTerm = searchInput ? searchInput.value.trim().toLowerCase() : '';
    const searchText = [
      card.dataset.search || '',
      card.innerText || ''
    ].join(' ').toLowerCase();

    return (!searchTerm || searchText.includes(searchTerm)) &&
      filterTypes.every(type => cardHasTerm(card, type));
  }

  function updateInsightVisibility() {
    const cards = document.querySelectorAll('.insight-card');
    const placeholders = document.querySelectorAll('.insight-placeholder');
    const noResults = document.getElementById('insightsNoResults');
    let visibleCount = 0;

    cards.forEach(card => {
      const isVisible = matchesFilters(card);
      card.hidden = !isVisible;
      if (isVisible) {
        visibleCount += 1;
      }
    });

    placeholders.forEach(placeholder => {
      placeholder.hidden = visibleCount === 0;
    });

    if (noResults) {
      noResults.hidden = visibleCount !== 0;
    }
  }

  function updateFilterLabels() {
    document.querySelectorAll('.filter-group[data-filter-group]').forEach(group => {
      const type = group.dataset.filterGroup;
      const label = group.querySelector('.filter-row span:first-child');
      const activeValue = insightFilterState[type] || '';
      const activeOption = group.querySelector(`[data-filter-type="${type}"][data-value="${activeValue}"]`);

      if (label) {
        label.textContent = activeValue && activeOption
          ? activeOption.textContent.trim()
          : group.dataset.defaultLabel;
      }
    });
  }

  function updateActiveFilterOptions() {
    document.querySelectorAll('.filter-option[data-filter-type]').forEach(option => {
      const type = option.dataset.filterType;
      const isActive = (option.dataset.value || '') === insightFilterState[type];
      option.classList.toggle('is-active', isActive);
      option.setAttribute('aria-current', String(isActive));
    });
  }

  function closeFilters() {
    document.querySelectorAll('.filter-content').forEach(content => content.style.maxHeight = '0px');
    document.querySelectorAll('.icon').forEach(icon => icon.style.transform = 'rotate(0deg)');
  }

  function filterInsights() {
    updateInsightVisibility();
  }

  function applyFilter(type, value) {
    if (!Object.prototype.hasOwnProperty.call(insightFilterState, type)) {
      return;
    }

    insightFilterState[type] = value;
    updateFilterLabels();
    updateActiveFilterOptions();
    filterInsights();
    closeFilters();
  }

  function resetFilters() {
    const searchInput = document.getElementById('insightSearch');
    if (searchInput) {
      searchInput.value = '';
    }

    filterTypes.forEach(type => {
      insightFilterState[type] = '';
    });

    updateFilterLabels();
    updateActiveFilterOptions();
    filterInsights();
    closeFilters();
  }
})();
