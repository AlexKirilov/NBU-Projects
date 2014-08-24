namespace FirstForm1
{
    partial class Form1
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
            this.label3 = new System.Windows.Forms.Label();
            this.label4 = new System.Windows.Forms.Label();
            this.StA = new System.Windows.Forms.TextBox();
            this.StB = new System.Windows.Forms.TextBox();
            this.StC = new System.Windows.Forms.TextBox();
            this.calc = new System.Windows.Forms.Button();
            this.label5 = new System.Windows.Forms.Label();
            this.SuspendLayout();
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(13, 13);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(159, 13);
            this.label1.TabIndex = 0;
            this.label1.Text = "Enter your Values for A, B and C";
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Location = new System.Drawing.Point(14, 43);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(19, 13);
            this.label2.TabIndex = 1;
            this.label2.Text = "a=";
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Location = new System.Drawing.Point(14, 69);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(19, 13);
            this.label3.TabIndex = 2;
            this.label3.Text = "b=";
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Location = new System.Drawing.Point(14, 95);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(19, 13);
            this.label4.TabIndex = 3;
            this.label4.Text = "c=";
            // 
            // StA
            // 
            this.StA.Location = new System.Drawing.Point(39, 40);
            this.StA.Name = "StA";
            this.StA.Size = new System.Drawing.Size(55, 20);
            this.StA.TabIndex = 4;
            // 
            // StB
            // 
            this.StB.Location = new System.Drawing.Point(39, 66);
            this.StB.Name = "StB";
            this.StB.Size = new System.Drawing.Size(55, 20);
            this.StB.TabIndex = 5;
            // 
            // StC
            // 
            this.StC.Location = new System.Drawing.Point(39, 92);
            this.StC.Name = "StC";
            this.StC.Size = new System.Drawing.Size(55, 20);
            this.StC.TabIndex = 6;
            // 
            // calc
            // 
            this.calc.BackColor = System.Drawing.SystemColors.ActiveBorder;
            this.calc.Location = new System.Drawing.Point(164, 95);
            this.calc.Name = "calc";
            this.calc.Size = new System.Drawing.Size(75, 23);
            this.calc.TabIndex = 7;
            this.calc.Text = "Claculation";
            this.calc.UseVisualStyleBackColor = false;
            this.calc.Click += new System.EventHandler(this.calc_Click);
            // 
            // label5
            // 
            this.label5.AutoSize = true;
            this.label5.BackColor = System.Drawing.SystemColors.Highlight;
            this.label5.Location = new System.Drawing.Point(36, 149);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(50, 13);
            this.label5.TabIndex = 9;
            this.label5.Text = "Result is:";
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackColor = System.Drawing.SystemColors.ControlLight;
            this.ClientSize = new System.Drawing.Size(299, 208);
            this.Controls.Add(this.label5);
            this.Controls.Add(this.calc);
            this.Controls.Add(this.StC);
            this.Controls.Add(this.StB);
            this.Controls.Add(this.StA);
            this.Controls.Add(this.label4);
            this.Controls.Add(this.label3);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.label1);
            this.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedSingle;
            this.Name = "Form1";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Math";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.TextBox StA;
        private System.Windows.Forms.TextBox StB;
        private System.Windows.Forms.TextBox StC;
        private System.Windows.Forms.Button calc;
        private System.Windows.Forms.Label label5;
    }
}

