namespace WindowsFormsApplication1
{
    partial class GeometryMain
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(GeometryMain));
            this.sideALabel = new System.Windows.Forms.Label();
            this.sideCLabel = new System.Windows.Forms.Label();
            this.sideBLabel = new System.Windows.Forms.Label();
            this.labelRorD = new System.Windows.Forms.Label();
            this.textBoxA = new System.Windows.Forms.TextBox();
            this.textBoxB = new System.Windows.Forms.TextBox();
            this.textBoxC = new System.Windows.Forms.TextBox();
            this.textBoxRorD = new System.Windows.Forms.TextBox();
            this.buttonStart = new System.Windows.Forms.Button();
            this.buttonCalcCircle = new System.Windows.Forms.Button();
            this.buttonCalcTriangle = new System.Windows.Forms.Button();
            this.buttonCalcRectangle = new System.Windows.Forms.Button();
            this.labelResult = new System.Windows.Forms.Label();
            this.labelHalfPerimether = new System.Windows.Forms.Label();
            this.radioButtonRadius = new System.Windows.Forms.RadioButton();
            this.radioButtonDiameter = new System.Windows.Forms.RadioButton();
            this.pictureBoxGeometry = new System.Windows.Forms.PictureBox();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxGeometry)).BeginInit();
            this.SuspendLayout();
            // 
            // sideALabel
            // 
            resources.ApplyResources(this.sideALabel, "sideALabel");
            this.sideALabel.Name = "sideALabel";
            // 
            // sideCLabel
            // 
            resources.ApplyResources(this.sideCLabel, "sideCLabel");
            this.sideCLabel.Name = "sideCLabel";
            // 
            // sideBLabel
            // 
            resources.ApplyResources(this.sideBLabel, "sideBLabel");
            this.sideBLabel.Name = "sideBLabel";
            // 
            // labelRorD
            // 
            resources.ApplyResources(this.labelRorD, "labelRorD");
            this.labelRorD.Name = "labelRorD";
            // 
            // textBoxA
            // 
            resources.ApplyResources(this.textBoxA, "textBoxA");
            this.textBoxA.Name = "textBoxA";
            this.textBoxA.Click += new System.EventHandler(this.textBoxA_Click);
            this.textBoxA.TextChanged += new System.EventHandler(this.textBoxA_TextChanged);
            // 
            // textBoxB
            // 
            resources.ApplyResources(this.textBoxB, "textBoxB");
            this.textBoxB.Name = "textBoxB";
            this.textBoxB.Click += new System.EventHandler(this.textBoxB_Click);
            this.textBoxB.TextChanged += new System.EventHandler(this.textBoxB_TextChanged);
            // 
            // textBoxC
            // 
            resources.ApplyResources(this.textBoxC, "textBoxC");
            this.textBoxC.Name = "textBoxC";
            this.textBoxC.Click += new System.EventHandler(this.textBoxC_Click);
            this.textBoxC.TextChanged += new System.EventHandler(this.textBoxC_TextChanged);
            // 
            // textBoxRorD
            // 
            resources.ApplyResources(this.textBoxRorD, "textBoxRorD");
            this.textBoxRorD.Name = "textBoxRorD";
            this.textBoxRorD.Click += new System.EventHandler(this.textBoxD_Click);
            this.textBoxRorD.TextChanged += new System.EventHandler(this.textBoxD_TextChanged);
            // 
            // buttonStart
            // 
            resources.ApplyResources(this.buttonStart, "buttonStart");
            this.buttonStart.Name = "buttonStart";
            this.buttonStart.UseVisualStyleBackColor = true;
            this.buttonStart.Click += new System.EventHandler(this.buttonStart_Click);
            // 
            // buttonCalcCircle
            // 
            resources.ApplyResources(this.buttonCalcCircle, "buttonCalcCircle");
            this.buttonCalcCircle.Name = "buttonCalcCircle";
            this.buttonCalcCircle.UseVisualStyleBackColor = true;
            this.buttonCalcCircle.Click += new System.EventHandler(this.buttonCalcCircle_Click);
            // 
            // buttonCalcTriangle
            // 
            resources.ApplyResources(this.buttonCalcTriangle, "buttonCalcTriangle");
            this.buttonCalcTriangle.Name = "buttonCalcTriangle";
            this.buttonCalcTriangle.UseVisualStyleBackColor = true;
            this.buttonCalcTriangle.Click += new System.EventHandler(this.buttonCalcTriangle_Click);
            // 
            // buttonCalcRectangle
            // 
            resources.ApplyResources(this.buttonCalcRectangle, "buttonCalcRectangle");
            this.buttonCalcRectangle.Name = "buttonCalcRectangle";
            this.buttonCalcRectangle.UseVisualStyleBackColor = true;
            this.buttonCalcRectangle.Click += new System.EventHandler(this.buttonCalcRectangle_Click);
            // 
            // labelResult
            // 
            this.labelResult.AutoEllipsis = true;
            resources.ApplyResources(this.labelResult, "labelResult");
            this.labelResult.FlatStyle = System.Windows.Forms.FlatStyle.System;
            this.labelResult.Name = "labelResult";
            // 
            // labelHalfPerimether
            // 
            resources.ApplyResources(this.labelHalfPerimether, "labelHalfPerimether");
            this.labelHalfPerimether.Name = "labelHalfPerimether";
            // 
            // radioButtonRadius
            // 
            resources.ApplyResources(this.radioButtonRadius, "radioButtonRadius");
            this.radioButtonRadius.Name = "radioButtonRadius";
            this.radioButtonRadius.TabStop = true;
            this.radioButtonRadius.UseVisualStyleBackColor = true;
            this.radioButtonRadius.CheckedChanged += new System.EventHandler(this.radioButtonRadius_CheckedChanged);
            // 
            // radioButtonDiameter
            // 
            resources.ApplyResources(this.radioButtonDiameter, "radioButtonDiameter");
            this.radioButtonDiameter.Name = "radioButtonDiameter";
            this.radioButtonDiameter.TabStop = true;
            this.radioButtonDiameter.UseVisualStyleBackColor = true;
            this.radioButtonDiameter.CheckedChanged += new System.EventHandler(this.radioButtonDiameter_CheckedChanged);
            // 
            // pictureBoxGeometry
            // 
            this.pictureBoxGeometry.Image = global::WindowsFormsApplicationTriangle.Properties.Resources.geometry_icon;
            this.pictureBoxGeometry.InitialImage = global::WindowsFormsApplicationTriangle.Properties.Resources.geometry_icon;
            resources.ApplyResources(this.pictureBoxGeometry, "pictureBoxGeometry");
            this.pictureBoxGeometry.Name = "pictureBoxGeometry";
            this.pictureBoxGeometry.TabStop = false;
            // 
            // GeometryMain
            // 
            resources.ApplyResources(this, "$this");
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.Controls.Add(this.pictureBoxGeometry);
            this.Controls.Add(this.radioButtonDiameter);
            this.Controls.Add(this.radioButtonRadius);
            this.Controls.Add(this.labelHalfPerimether);
            this.Controls.Add(this.labelResult);
            this.Controls.Add(this.buttonCalcRectangle);
            this.Controls.Add(this.buttonCalcTriangle);
            this.Controls.Add(this.buttonCalcCircle);
            this.Controls.Add(this.buttonStart);
            this.Controls.Add(this.textBoxRorD);
            this.Controls.Add(this.textBoxC);
            this.Controls.Add(this.textBoxB);
            this.Controls.Add(this.textBoxA);
            this.Controls.Add(this.labelRorD);
            this.Controls.Add(this.sideBLabel);
            this.Controls.Add(this.sideCLabel);
            this.Controls.Add(this.sideALabel);
            this.Cursor = System.Windows.Forms.Cursors.Hand;
            this.FormBorderStyle = System.Windows.Forms.FormBorderStyle.SizableToolWindow;
            this.KeyPreview = true;
            this.Name = "GeometryMain";
            this.Load += new System.EventHandler(this.Form1_Load);
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxGeometry)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label sideALabel;
        private System.Windows.Forms.Label sideCLabel;
        private System.Windows.Forms.Label sideBLabel;
        private System.Windows.Forms.Label labelRorD;
        private System.Windows.Forms.TextBox textBoxA;
        private System.Windows.Forms.TextBox textBoxB;
        private System.Windows.Forms.TextBox textBoxC;
        private System.Windows.Forms.TextBox textBoxRorD;
        private System.Windows.Forms.Button buttonStart;
        private System.Windows.Forms.Button buttonCalcCircle;
        private System.Windows.Forms.Button buttonCalcTriangle;
        private System.Windows.Forms.Button buttonCalcRectangle;
        private System.Windows.Forms.Label labelResult;
        private System.Windows.Forms.Label labelHalfPerimether;
        private System.Windows.Forms.RadioButton radioButtonRadius;
        private System.Windows.Forms.RadioButton radioButtonDiameter;
        private System.Windows.Forms.PictureBox pictureBoxGeometry;
    }
}

