import './bootstrap';
import { createApp } from 'vue';
import { watch, ref, nextTick } from 'vue'
import axios from 'axios';
import Quill from "quill";
import "quill/dist/quill.core.css";
import "quill/dist/quill.bubble.css";
import "quill/dist/quill.snow.css";


createApp({
  data() {
    return {
      descriptionEditor: null,
      descriptionEditorValue: '',
    }
  },
  mounted() {
    var _this = this;

    this.descriptionEditor = new Quill(this.$refs.descriptionEditor, {
      modules: {
        toolbar: [
          [
            {
              header: [1, 2, 3, 4, false],
            },
          ],
          ["bold", "italic", "underline", "link"],
        ],
      },
      //theme: 'bubble',
      theme: "snow",
      formats: ["bold", "underline", "header", "italic", "link"],
      placeholder: "Type something in here!",
    });
    console.log(this.descriptionEditor);

    // var delta = {
    //   "ops": [
    //     {
    //       "insert": "some thing \n\n"
    //     },
    //     {
    //       "attributes": {
    //         "bold": true
    //       },
    //       "insert": "bold ddd"
    //     },
    //     {
    //       "insert": "\n\nand "
    //     },
    //     {
    //       "attributes": {
    //         "italic": true
    //       },
    //       "insert": "italic"
    //     },
    //     {
    //       "insert": "\n"
    //     }
    //   ]
    // };
    // this.descriptionEditor.setContents(delta);

    this.descriptionEditor.root.innerHTML = '<p>dfcb</p><p><br></p><p>cbc</p><p><strong>bcgh</strong></p><p><br></p><p><br></p><p><strong>fghfgh</strong></p><p><br></p><p>fghfg</p>';
    // this.descriptionEditor.root.innerHTML = this.descriptionEditorValue;
    this.descriptionEditor.on("text-change", function () {
      // return _this.update();
      _this.descriptionEditorChanged();
    });

  },
  methods: {
    descriptionEditorChanged() {
      console.log("descriptionEditorChanged");
      console.log(this.descriptionEditor.root.innerHTML);
    },
    update: function update() {
      this.$emit(
        "update:descriptionEditorValue",
        this.descriptionEditor.getText() ? this.descriptionEditor.root.innerHTML : ""
      );
    }, 
  }
}).mount('#app')
