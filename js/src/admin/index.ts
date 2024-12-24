import app from 'flarum/admin/app';

app.initializers.add('huseyinfiliz/flagify', () => {
  app.extensionData
    .for('huseyinfiliz-flagify')
    .registerSetting({
      setting: 'huseyinfiliz.flagify.threshold',
      label: app.translator.trans('huseyinfiliz-flagify.admin.settings.threshold_label'),
      type: 'number',
      default: 2,
    });
});
