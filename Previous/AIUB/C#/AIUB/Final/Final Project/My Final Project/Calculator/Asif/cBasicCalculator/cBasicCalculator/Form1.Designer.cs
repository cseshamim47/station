namespace cBasicCalculator
{
    partial class Calculator
    {
        /// <summary>
        ///  Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        ///  Clean up any resources being used.
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
        ///  Required method for Designer support - do not modify
        ///  the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(Calculator));
            this.txtResult = new System.Windows.Forms.TextBox();
            this.btnPlus = new System.Windows.Forms.Button();
            this.btnDivision = new System.Windows.Forms.Button();
            this.btnMultiplication = new System.Windows.Forms.Button();
            this.btnMinus = new System.Windows.Forms.Button();
            this.btn0 = new System.Windows.Forms.Button();
            this.btnEqual = new System.Windows.Forms.Button();
            this.btnDott = new System.Windows.Forms.Button();
            this.btn8 = new System.Windows.Forms.Button();
            this.btn9 = new System.Windows.Forms.Button();
            this.btnClear = new System.Windows.Forms.Button();
            this.btn7 = new System.Windows.Forms.Button();
            this.btn5 = new System.Windows.Forms.Button();
            this.btn6 = new System.Windows.Forms.Button();
            this.btn4 = new System.Windows.Forms.Button();
            this.btn2 = new System.Windows.Forms.Button();
            this.btn3 = new System.Windows.Forms.Button();
            this.btn1 = new System.Windows.Forms.Button();
            this.btnPercentage = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // txtResult
            // 
            this.txtResult.Enabled = false;
            this.txtResult.Font = new System.Drawing.Font("Segoe UI", 16.2F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.txtResult.Location = new System.Drawing.Point(10, 11);
            this.txtResult.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.txtResult.Multiline = true;
            this.txtResult.Name = "txtResult";
            this.txtResult.ReadOnly = true;
            this.txtResult.Size = new System.Drawing.Size(303, 60);
            this.txtResult.TabIndex = 0;
            this.txtResult.Text = "0";
            this.txtResult.TextAlign = System.Windows.Forms.HorizontalAlignment.Right;
            // 
            // btnPlus
            // 
            this.btnPlus.Font = new System.Drawing.Font("Segoe UI", 13.2F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point);
            this.btnPlus.Location = new System.Drawing.Point(10, 74);
            this.btnPlus.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.btnPlus.Name = "btnPlus";
            this.btnPlus.Size = new System.Drawing.Size(72, 50);
            this.btnPlus.TabIndex = 2;
            this.btnPlus.Text = "+";
            this.btnPlus.UseVisualStyleBackColor = true;
            this.btnPlus.Click += new System.EventHandler(this.btnPlus_Click);
            // 
            // btnDivision
            // 
            this.btnDivision.Font = new System.Drawing.Font("Segoe UI", 13.2F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point);
            this.btnDivision.Location = new System.Drawing.Point(242, 128);
            this.btnDivision.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.btnDivision.Name = "btnDivision";
            this.btnDivision.Size = new System.Drawing.Size(72, 50);
            this.btnDivision.TabIndex = 4;
            this.btnDivision.Text = "/";
            this.btnDivision.UseVisualStyleBackColor = true;
            this.btnDivision.Click += new System.EventHandler(this.btnDivision_Click);
            // 
            // btnMultiplication
            // 
            this.btnMultiplication.Font = new System.Drawing.Font("Segoe UI", 13.2F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point);
            this.btnMultiplication.Location = new System.Drawing.Point(164, 74);
            this.btnMultiplication.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.btnMultiplication.Name = "btnMultiplication";
            this.btnMultiplication.Size = new System.Drawing.Size(72, 50);
            this.btnMultiplication.TabIndex = 5;
            this.btnMultiplication.Text = "*";
            this.btnMultiplication.UseVisualStyleBackColor = true;
            this.btnMultiplication.Click += new System.EventHandler(this.btnMultiplication_Click);
            // 
            // btnMinus
            // 
            this.btnMinus.Font = new System.Drawing.Font("Segoe UI", 13.2F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point);
            this.btnMinus.Location = new System.Drawing.Point(88, 74);
            this.btnMinus.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.btnMinus.Name = "btnMinus";
            this.btnMinus.Size = new System.Drawing.Size(72, 50);
            this.btnMinus.TabIndex = 6;
            this.btnMinus.Text = "-";
            this.btnMinus.UseVisualStyleBackColor = true;
            this.btnMinus.Click += new System.EventHandler(this.btnMinus_Click);
            // 
            // btn0
            // 
            this.btn0.Font = new System.Drawing.Font("Segoe UI", 13.2F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point);
            this.btn0.Location = new System.Drawing.Point(87, 290);
            this.btn0.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.btn0.Name = "btn0";
            this.btn0.Size = new System.Drawing.Size(73, 50);
            this.btn0.TabIndex = 22;
            this.btn0.Text = "0";
            this.btn0.UseVisualStyleBackColor = true;
            this.btn0.Click += new System.EventHandler(this.btn0_Click);
            // 
            // btnEqual
            // 
            this.btnEqual.Font = new System.Drawing.Font("Segoe UI", 13.2F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point);
            this.btnEqual.Location = new System.Drawing.Point(242, 182);
            this.btnEqual.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.btnEqual.Name = "btnEqual";
            this.btnEqual.Size = new System.Drawing.Size(72, 158);
            this.btnEqual.TabIndex = 20;
            this.btnEqual.Text = "=";
            this.btnEqual.UseVisualStyleBackColor = true;
            this.btnEqual.Click += new System.EventHandler(this.btnEqual_Click);
            // 
            // btnDott
            // 
            this.btnDott.Font = new System.Drawing.Font("Segoe UI", 13.2F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point);
            this.btnDott.Location = new System.Drawing.Point(9, 290);
            this.btnDott.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.btnDott.Name = "btnDott";
            this.btnDott.Size = new System.Drawing.Size(72, 50);
            this.btnDott.TabIndex = 19;
            this.btnDott.Text = ".";
            this.btnDott.UseVisualStyleBackColor = true;
            this.btnDott.Click += new System.EventHandler(this.btnDott_Click_1);
            // 
            // btn8
            // 
            this.btn8.Font = new System.Drawing.Font("Segoe UI", 13.2F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point);
            this.btn8.Location = new System.Drawing.Point(88, 128);
            this.btn8.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.btn8.Name = "btn8";
            this.btn8.Size = new System.Drawing.Size(72, 50);
            this.btn8.TabIndex = 26;
            this.btn8.Text = "8";
            this.btn8.UseVisualStyleBackColor = true;
            this.btn8.Click += new System.EventHandler(this.btn8_Click);
            // 
            // btn9
            // 
            this.btn9.Font = new System.Drawing.Font("Segoe UI", 13.2F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point);
            this.btn9.Location = new System.Drawing.Point(164, 128);
            this.btn9.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.btn9.Name = "btn9";
            this.btn9.Size = new System.Drawing.Size(72, 50);
            this.btn9.TabIndex = 25;
            this.btn9.Text = "9";
            this.btn9.UseVisualStyleBackColor = true;
            this.btn9.Click += new System.EventHandler(this.btn9_Click);
            // 
            // btnClear
            // 
            this.btnClear.Font = new System.Drawing.Font("Segoe UI", 13.2F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point);
            this.btnClear.Location = new System.Drawing.Point(242, 74);
            this.btnClear.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.btnClear.Name = "btnClear";
            this.btnClear.Size = new System.Drawing.Size(72, 50);
            this.btnClear.TabIndex = 24;
            this.btnClear.Text = "C";
            this.btnClear.UseVisualStyleBackColor = true;
            this.btnClear.Click += new System.EventHandler(this.btnClear_Click);
            // 
            // btn7
            // 
            this.btn7.Font = new System.Drawing.Font("Segoe UI", 13.2F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point);
            this.btn7.Location = new System.Drawing.Point(10, 128);
            this.btn7.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.btn7.Name = "btn7";
            this.btn7.Size = new System.Drawing.Size(72, 50);
            this.btn7.TabIndex = 23;
            this.btn7.Text = "7";
            this.btn7.UseVisualStyleBackColor = true;
            this.btn7.Click += new System.EventHandler(this.btn7_Click);
            // 
            // btn5
            // 
            this.btn5.Font = new System.Drawing.Font("Segoe UI", 13.2F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point);
            this.btn5.Location = new System.Drawing.Point(88, 182);
            this.btn5.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.btn5.Name = "btn5";
            this.btn5.Size = new System.Drawing.Size(72, 50);
            this.btn5.TabIndex = 30;
            this.btn5.Text = "5";
            this.btn5.UseVisualStyleBackColor = true;
            this.btn5.Click += new System.EventHandler(this.btn5_Click);
            // 
            // btn6
            // 
            this.btn6.Font = new System.Drawing.Font("Segoe UI", 13.2F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point);
            this.btn6.Location = new System.Drawing.Point(164, 182);
            this.btn6.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.btn6.Name = "btn6";
            this.btn6.Size = new System.Drawing.Size(72, 50);
            this.btn6.TabIndex = 29;
            this.btn6.Text = "6";
            this.btn6.UseVisualStyleBackColor = true;
            this.btn6.Click += new System.EventHandler(this.btn6_Click);
            // 
            // btn4
            // 
            this.btn4.Font = new System.Drawing.Font("Segoe UI", 13.2F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point);
            this.btn4.Location = new System.Drawing.Point(10, 182);
            this.btn4.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.btn4.Name = "btn4";
            this.btn4.Size = new System.Drawing.Size(72, 50);
            this.btn4.TabIndex = 27;
            this.btn4.Text = "4";
            this.btn4.UseVisualStyleBackColor = true;
            this.btn4.Click += new System.EventHandler(this.btn4_Click);
            // 
            // btn2
            // 
            this.btn2.Font = new System.Drawing.Font("Segoe UI", 13.2F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point);
            this.btn2.Location = new System.Drawing.Point(88, 236);
            this.btn2.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.btn2.Name = "btn2";
            this.btn2.Size = new System.Drawing.Size(72, 50);
            this.btn2.TabIndex = 34;
            this.btn2.Text = "2";
            this.btn2.UseVisualStyleBackColor = true;
            this.btn2.Click += new System.EventHandler(this.btn2_Click);
            // 
            // btn3
            // 
            this.btn3.Font = new System.Drawing.Font("Segoe UI", 13.2F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point);
            this.btn3.Location = new System.Drawing.Point(164, 236);
            this.btn3.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.btn3.Name = "btn3";
            this.btn3.Size = new System.Drawing.Size(72, 50);
            this.btn3.TabIndex = 33;
            this.btn3.Text = "3";
            this.btn3.UseVisualStyleBackColor = true;
            this.btn3.Click += new System.EventHandler(this.btn3_Click);
            // 
            // btn1
            // 
            this.btn1.Font = new System.Drawing.Font("Segoe UI", 13.2F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point);
            this.btn1.Location = new System.Drawing.Point(10, 236);
            this.btn1.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.btn1.Name = "btn1";
            this.btn1.Size = new System.Drawing.Size(72, 50);
            this.btn1.TabIndex = 31;
            this.btn1.Text = "1";
            this.btn1.UseVisualStyleBackColor = true;
            this.btn1.Click += new System.EventHandler(this.btn1_Click);
            // 
            // btnPercentage
            // 
            this.btnPercentage.Font = new System.Drawing.Font("Segoe UI", 14.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point);
            this.btnPercentage.Location = new System.Drawing.Point(163, 290);
            this.btnPercentage.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.btnPercentage.Name = "btnPercentage";
            this.btnPercentage.Size = new System.Drawing.Size(73, 50);
            this.btnPercentage.TabIndex = 35;
            this.btnPercentage.Text = "%";
            this.btnPercentage.UseVisualStyleBackColor = true;
            this.btnPercentage.Click += new System.EventHandler(this.btnPercentage_Click);
            // 
            // Calculator
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(7F, 15F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(324, 359);
            this.Controls.Add(this.btnPercentage);
            this.Controls.Add(this.btn2);
            this.Controls.Add(this.btn3);
            this.Controls.Add(this.btn1);
            this.Controls.Add(this.btn5);
            this.Controls.Add(this.btn6);
            this.Controls.Add(this.btn4);
            this.Controls.Add(this.btn8);
            this.Controls.Add(this.btn9);
            this.Controls.Add(this.btnClear);
            this.Controls.Add(this.btn7);
            this.Controls.Add(this.btn0);
            this.Controls.Add(this.btnEqual);
            this.Controls.Add(this.btnDott);
            this.Controls.Add(this.btnMinus);
            this.Controls.Add(this.btnMultiplication);
            this.Controls.Add(this.btnDivision);
            this.Controls.Add(this.btnPlus);
            this.Controls.Add(this.txtResult);
            this.Icon = ((System.Drawing.Icon)(resources.GetObject("$this.Icon")));
            this.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.MaximizeBox = false;
            this.Name = "Calculator";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Calculator";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private TextBox txtResult;
        private Button btnPlus;
        private Button btnDivision;
        private Button btnMultiplication;
        private Button btnMinus;
        private Button btn0;
        private Button btnEqual;
        private Button btnDott;
        private Button btn8;
        private Button btn9;
        private Button btnClear;
        private Button btn7;
        private Button btn5;
        private Button btn6;
        private Button btn4;
        private Button btn2;
        private Button btn3;
        private Button btn1;
        private Button btnPercentage;
    }
}