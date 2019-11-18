sap.ui.define([
  "sap/ui/core/mvc/Controller",
  "sap/m/MessageToast",
  "sap/ui/core/routing/History",
  "sap/ui/model/json/JSONModel",
  "sap/ui/model/odata/v2/ODataModel",
  'sap/m/Popover',
  'sap/m/Button',
  'sap/m/library'
], function (Controller, MessageToast, History, JSONModel, ODataModel, Popover, Button, mobileLibrary ) {
  "use strict";

  var ButtonType = mobileLibrary.ButtonType,
  PlacementType = mobileLibrary.PlacementType;

  return Controller.extend("sap.ui.app01.controller.BaseController", {

    getRouter : function () {
      return sap.ui.core.UIComponent.getRouterFor(this);
    },
    onUserNamePress: function (event) {
      var popover = new Popover({
        showHeader: false,
        placement: PlacementType.Bottom,
        content:[
          new Button({
            text: 'Mis datos',
            type: ButtonType.Transparent
          }),
          new Button({
            text: 'Salir',
            type: ButtonType.Transparent,
            press: function () {
              thes.getRouter().navTo("login");
              if (thes.getRouter().navTo("login")) {
                sessionStorage.clear();
              }
            }
          })
        ]
      }).addStyleClass('sapMOTAPopover sapTntToolHeaderPopover');

      popover.openBy(event.getSource());
    },
    onHomePress: function(oEvent){
      var thes = this;
      thes.getRouter().navTo('home');
    },
    onPress: function(oEvent){
      var thes = this;
      var oSource = oEvent.getSource(),
      bindingContext = oSource.getBindingContext(),
      sPath = bindingContext.sPath,
      splitSpath = sPath.split('/'),
      index = splitSpath[2],
      dataModel = thes.getView().getModel().getData(),
      dataIndex = dataModel.TileCollection[index],
      view = dataIndex.view;
      thes.getRouter().navTo(view);
    },
    onTeam: function(oEvent){
      var thes = this;
      thes.getRouter().navTo('team');
    },
    onKpi: function(oEvent){
      var thes = this;
      thes.getRouter().navTo('kpi');
    }
  });
});
