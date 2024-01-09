namespace WFAStart
{
    partial class FormTest
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
            this.lblOutput = new System.Windows.Forms.Label();
            this.txtInput = new System.Windows.Forms.TextBox();
            this.myButton = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // lblOutput
            // 
            this.lblOutput.AutoSize = true;
            this.lblOutput.Font = new System.Drawing.Font("Microsoft Uighur", 18F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblOutput.Location = new System.Drawing.Point(92, 174);
            this.lblOutput.Name = "lblOutput";
            this.lblOutput.Size = new System.Drawing.Size(106, 31);
            this.lblOutput.TabIndex = 0;
            this.lblOutput.Text = "This is a text";
            // 
            // txtInput
            // 
            this.txtInput.Location = new System.Drawing.Point(60, 29);
            this.txtInput.Name = "txtInput";
            this.txtInput.Size = new System.Drawing.Size(129, 20);
            this.txtInput.TabIndex = 1;
            // 
            // myButton
            // 
            this.myButton.Location = new System.Drawing.Point(216, 29);
            this.myButton.Name = "myButton";
            this.myButton.Size = new System.Drawing.Size(75, 28);
            this.myButton.TabIndex = 2;
            this.myButton.Text = "Show";
            this.myButton.UseVisualStyleBackColor = true;
            this.myButton.Click += new System.EventHandler(this.myButton_Click);
            // 
            // FormTest
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackColor = System.Drawing.SystemColors.ActiveBorder;
            this.ClientSize = new System.Drawing.Size(354, 281);
            this.Controls.Add(this.myButton);
            this.Controls.Add(this.txtInput);
            this.Controls.Add(this.lblOutput);
            this.Name = "FormTest";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Test Window";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label lblOutput;
        private System.Windows.Forms.TextBox txtInput;
        private System.Windows.Forms.Button myButton;
    }
}

