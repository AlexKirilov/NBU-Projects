namespace TriangleTypesZad2
{
    partial class TriangleTypes
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
            this.label1 = new System.Windows.Forms.Label();
            this.label2 = new System.Windows.Forms.Label();
            this.StAA = new System.Windows.Forms.Label();
            this.StBB = new System.Windows.Forms.Label();
            this.StCC = new System.Windows.Forms.Label();
            this.StA = new System.Windows.Forms.TextBox();
            this.StB = new System.Windows.Forms.TextBox();
            this.StC = new System.Windows.Forms.TextBox();
            this.button1 = new System.Windows.Forms.Button();
            this.Result = new System.Windows.Forms.Label();
            this.SuspendLayout();
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Cursor = System.Windows.Forms.Cursors.Default;
            this.label1.Location = new System.Drawing.Point(12, 9);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(131, 13);
            this.label1.TabIndex = 0;
            this.label1.Text = "Check the type of triangle.";
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Location = new System.Drawing.Point(12, 45);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(85, 13);
            this.label2.TabIndex = 1;
            this.label2.Text = "Enter Values for:";
            // 
            // StAA
            // 
            this.StAA.AutoSize = true;
            this.StAA.Location = new System.Drawing.Point(6, 78);
            this.StAA.Name = "StAA";
            this.StAA.Size = new System.Drawing.Size(20, 13);
            this.StAA.TabIndex = 2;
            this.StAA.Text = "A=";
            // 
            // StBB
            // 
            this.StBB.AutoSize = true;
            this.StBB.Location = new System.Drawing.Point(6, 104);
            this.StBB.Name = "StBB";
            this.StBB.Size = new System.Drawing.Size(20, 13);
            this.StBB.TabIndex = 3;
            this.StBB.Text = "B=";
            // 
            // StCC
            // 
            this.StCC.AutoSize = true;
            this.StCC.Location = new System.Drawing.Point(6, 130);
            this.StCC.Name = "StCC";
            this.StCC.Size = new System.Drawing.Size(20, 13);
            this.StCC.TabIndex = 4;
            this.StCC.Text = "C=";
            // 
            // StA
            // 
            this.StA.Location = new System.Drawing.Point(32, 75);
            this.StA.Name = "StA";
            this.StA.Size = new System.Drawing.Size(65, 20);
            this.StA.TabIndex = 5;
            this.StA.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // StB
            // 
            this.StB.Location = new System.Drawing.Point(32, 101);
            this.StB.Name = "StB";
            this.StB.Size = new System.Drawing.Size(65, 20);
            this.StB.TabIndex = 6;
            this.StB.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // StC
            // 
            this.StC.Location = new System.Drawing.Point(32, 127);
            this.StC.Name = "StC";
            this.StC.Size = new System.Drawing.Size(65, 20);
            this.StC.TabIndex = 7;
            this.StC.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // button1
            // 
            this.button1.Location = new System.Drawing.Point(147, 98);
            this.button1.Name = "button1";
            this.button1.Size = new System.Drawing.Size(75, 23);
            this.button1.TabIndex = 8;
            this.button1.Text = "Submit";
            this.button1.UseVisualStyleBackColor = true;
            this.button1.Click += new System.EventHandler(this.button1_Click);
            // 
            // Result
            // 
            this.Result.AutoSize = true;
            this.Result.BackColor = System.Drawing.SystemColors.Window;
            this.Result.Location = new System.Drawing.Point(32, 182);
            this.Result.Name = "Result";
            this.Result.Size = new System.Drawing.Size(0, 13);
            this.Result.TabIndex = 9;
            // 
            // TriangleTypes
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(259, 250);
            this.Controls.Add(this.Result);
            this.Controls.Add(this.button1);
            this.Controls.Add(this.StC);
            this.Controls.Add(this.StB);
            this.Controls.Add(this.StA);
            this.Controls.Add(this.StCC);
            this.Controls.Add(this.StBB);
            this.Controls.Add(this.StAA);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.label1);
            this.Name = "TriangleTypes";
            this.Text = "Triangle Types";
            this.Load += new System.EventHandler(this.TriangleTypes_Load);
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.Label StAA;
        private System.Windows.Forms.Label StBB;
        private System.Windows.Forms.Label StCC;
        private System.Windows.Forms.TextBox StA;
        private System.Windows.Forms.TextBox StB;
        private System.Windows.Forms.TextBox StC;
        private System.Windows.Forms.Button button1;
        private System.Windows.Forms.Label Result;
    }
}

