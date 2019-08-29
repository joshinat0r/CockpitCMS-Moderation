<div class="uk-margin moderation-status" if="{field && field.length && moderation_field}">
  <div class="uk-width-1-1 uk-form-select uk-moderation-element uk-moderation-{ entry[moderation_field] }">
    <label class="uk-text-small">@lang('Submit as')</label>
    <div class="uk-margin-small-top">
      <span class="uk-badge uk-badge-outline">
        <i if="{entry[moderation_field] == 'Draft'}" class="uk-icon-pencil"></i>
        @lang("{entry[moderation_field]}")
      </span>
    </div>
  </div>
</div>

<script>
  var $this = this;
  $this.moderation_field = 'status';

  this.on('mount', function() {

    $this.field = this.collection.fields.filter(function(definition) {
      return definition.type === 'moderation';
    });

    if (!$this.field.length || $this.field[0].name === undefined) {
      return;
    }

    $this.moderation_field = $this.field[0].name;

    $this.entry[$this.moderation_field] = 'Draft';

    window.setTimeout(function() {
      sidebar = document.querySelector('.uk-width-medium-1-4.uk-flex-order-first');
      sidebar.insertBefore(document.querySelector('.moderation-status'), sidebar.childNodes[0]);
    }, 50);

    $this.update();
  });

</script>
