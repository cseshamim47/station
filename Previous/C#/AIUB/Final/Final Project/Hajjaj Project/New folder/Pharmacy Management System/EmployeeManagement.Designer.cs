namespace Pharmacy_Management_System
{
    partial class EmployeeManagement
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
            this.tableLayoutPanel1 = new System.Windows.Forms.TableLayoutPanel();
            this.label1 = new System.Windows.Forms.Label();
            this.txtEmployeeId = new System.Windows.Forms.TextBox();
            this.txtEmployeeSalary = new System.Windows.Forms.TextBox();
            this.lblEmployeeSalary = new System.Windows.Forms.Label();
            this.lblEmployeeName = new System.Windows.Forms.Label();
            this.txtEmpName = new System.Windows.Forms.TextBox();
            this.lblJoiningDate = new System.Windows.Forms.Label();
            this.label4 = new System.Windows.Forms.Label();
            this.txtPhoneNumber = new System.Windows.Forms.TextBox();
            this.dtpJoiningDate = new System.Windows.Forms.DateTimePicker();
            this.tableLayoutPanel2 = new System.Windows.Forms.TableLayoutPanel();
            this.btnRemove = new System.Windows.Forms.Button();
            this.btnClear = new System.Windows.Forms.Button();
            this.btnSave = new System.Windows.Forms.Button();
            this.btnHomePage = new System.Windows.Forms.Button();
            this.dgvEmployeeManagement = new System.Windows.Forms.DataGridView();
            this.EmployeeId = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.EmployeeName = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.EmployeeSalary = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.PhoneNumber = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.JoiningDate = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.tableLayoutPanel3 = new System.Windows.Forms.TableLayoutPanel();
            this.btnShowInfo = new System.Windows.Forms.Button();
            this.tableLayoutPanel1.SuspendLayout();
            this.tableLayoutPanel2.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dgvEmployeeManagement)).BeginInit();
            this.tableLayoutPanel3.SuspendLayout();
            this.SuspendLayout();
            // 
            // tableLayoutPanel1
            // 
            this.tableLayoutPanel1.Anchor = ((System.Windows.Forms.AnchorStyles)(((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.tableLayoutPanel1.BackColor = System.Drawing.SystemColors.HighlightText;
            this.tableLayoutPanel1.ColumnCount = 2;
            this.tableLayoutPanel1.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 24.83221F));
            this.tableLayoutPanel1.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 75.16779F));
            this.tableLayoutPanel1.Controls.Add(this.label1, 0, 0);
            this.tableLayoutPanel1.Controls.Add(this.txtEmployeeId, 1, 0);
            this.tableLayoutPanel1.Controls.Add(this.txtEmployeeSalary, 1, 2);
            this.tableLayoutPanel1.Controls.Add(this.lblEmployeeSalary, 0, 2);
            this.tableLayoutPanel1.Controls.Add(this.lblEmployeeName, 0, 1);
            this.tableLayoutPanel1.Controls.Add(this.txtEmpName, 1, 1);
            this.tableLayoutPanel1.Controls.Add(this.lblJoiningDate, 0, 4);
            this.tableLayoutPanel1.Controls.Add(this.label4, 0, 3);
            this.tableLayoutPanel1.Controls.Add(this.txtPhoneNumber, 1, 3);
            this.tableLayoutPanel1.Controls.Add(this.dtpJoiningDate, 1, 4);
            this.tableLayoutPanel1.ForeColor = System.Drawing.SystemColors.ActiveCaptionText;
            this.tableLayoutPanel1.GrowStyle = System.Windows.Forms.TableLayoutPanelGrowStyle.FixedSize;
            this.tableLayoutPanel1.Location = new System.Drawing.Point(16, 26);
            this.tableLayoutPanel1.Margin = new System.Windows.Forms.Padding(4);
            this.tableLayoutPanel1.Name = "tableLayoutPanel1";
            this.tableLayoutPanel1.RowCount = 5;
            this.tableLayoutPanel1.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 29.12913F));
            this.tableLayoutPanel1.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 26.28866F));
            this.tableLayoutPanel1.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 14.94845F));
            this.tableLayoutPanel1.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 29.12913F));
            this.tableLayoutPanel1.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Absolute, 23F));
            this.tableLayoutPanel1.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Absolute, 25F));
            this.tableLayoutPanel1.Size = new System.Drawing.Size(596, 244);
            this.tableLayoutPanel1.TabIndex = 0;
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Dock = System.Windows.Forms.DockStyle.Fill;
            this.label1.Font = new System.Drawing.Font("Microsoft Tai Le", 9F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label1.Location = new System.Drawing.Point(4, 0);
            this.label1.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(139, 64);
            this.label1.TabIndex = 0;
            this.label1.Text = "Employee Id";
            this.label1.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // txtEmployeeId
            // 
            this.txtEmployeeId.Anchor = ((System.Windows.Forms.AnchorStyles)((((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom) 
            | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.txtEmployeeId.Enabled = false;
            this.txtEmployeeId.Location = new System.Drawing.Point(151, 4);
            this.txtEmployeeId.Margin = new System.Windows.Forms.Padding(4);
            this.txtEmployeeId.Multiline = true;
            this.txtEmployeeId.Name = "txtEmployeeId";
            this.txtEmployeeId.Size = new System.Drawing.Size(441, 56);
            this.txtEmployeeId.TabIndex = 7;
            // 
            // txtEmployeeSalary
            // 
            this.txtEmployeeSalary.Anchor = ((System.Windows.Forms.AnchorStyles)(((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.txtEmployeeSalary.Location = new System.Drawing.Point(151, 126);
            this.txtEmployeeSalary.Margin = new System.Windows.Forms.Padding(4);
            this.txtEmployeeSalary.Multiline = true;
            this.txtEmployeeSalary.Name = "txtEmployeeSalary";
            this.txtEmployeeSalary.Size = new System.Drawing.Size(441, 24);
            this.txtEmployeeSalary.TabIndex = 4;
            // 
            // lblEmployeeSalary
            // 
            this.lblEmployeeSalary.AutoSize = true;
            this.lblEmployeeSalary.Dock = System.Windows.Forms.DockStyle.Fill;
            this.lblEmployeeSalary.Font = new System.Drawing.Font("Microsoft Tai Le", 7.8F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblEmployeeSalary.Location = new System.Drawing.Point(4, 122);
            this.lblEmployeeSalary.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.lblEmployeeSalary.Name = "lblEmployeeSalary";
            this.lblEmployeeSalary.Size = new System.Drawing.Size(139, 33);
            this.lblEmployeeSalary.TabIndex = 1;
            this.lblEmployeeSalary.Text = "Employee Salary";
            this.lblEmployeeSalary.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // lblEmployeeName
            // 
            this.lblEmployeeName.Anchor = ((System.Windows.Forms.AnchorStyles)((((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom) 
            | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.lblEmployeeName.AutoSize = true;
            this.lblEmployeeName.Font = new System.Drawing.Font("Microsoft Tai Le", 9F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblEmployeeName.Location = new System.Drawing.Point(4, 64);
            this.lblEmployeeName.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.lblEmployeeName.Name = "lblEmployeeName";
            this.lblEmployeeName.Size = new System.Drawing.Size(139, 58);
            this.lblEmployeeName.TabIndex = 8;
            this.lblEmployeeName.Text = "EmployeeName";
            this.lblEmployeeName.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // txtEmpName
            // 
            this.txtEmpName.Anchor = ((System.Windows.Forms.AnchorStyles)(((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.txtEmpName.Location = new System.Drawing.Point(151, 68);
            this.txtEmpName.Margin = new System.Windows.Forms.Padding(4);
            this.txtEmpName.Multiline = true;
            this.txtEmpName.Name = "txtEmpName";
            this.txtEmpName.Size = new System.Drawing.Size(441, 50);
            this.txtEmpName.TabIndex = 0;
            // 
            // lblJoiningDate
            // 
            this.lblJoiningDate.AutoSize = true;
            this.lblJoiningDate.Dock = System.Windows.Forms.DockStyle.Fill;
            this.lblJoiningDate.Font = new System.Drawing.Font("Microsoft Tai Le", 9F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblJoiningDate.Location = new System.Drawing.Point(4, 219);
            this.lblJoiningDate.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.lblJoiningDate.Name = "lblJoiningDate";
            this.lblJoiningDate.Size = new System.Drawing.Size(139, 25);
            this.lblJoiningDate.TabIndex = 2;
            this.lblJoiningDate.Text = "Joining Date";
            this.lblJoiningDate.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Dock = System.Windows.Forms.DockStyle.Fill;
            this.label4.Font = new System.Drawing.Font("Microsoft Tai Le", 9F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label4.Location = new System.Drawing.Point(4, 155);
            this.label4.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(139, 64);
            this.label4.TabIndex = 3;
            this.label4.Text = "Phone Number ";
            this.label4.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // txtPhoneNumber
            // 
            this.txtPhoneNumber.Anchor = ((System.Windows.Forms.AnchorStyles)(((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.txtPhoneNumber.Location = new System.Drawing.Point(151, 159);
            this.txtPhoneNumber.Margin = new System.Windows.Forms.Padding(4);
            this.txtPhoneNumber.Multiline = true;
            this.txtPhoneNumber.Name = "txtPhoneNumber";
            this.txtPhoneNumber.Size = new System.Drawing.Size(441, 56);
            this.txtPhoneNumber.TabIndex = 5;
            // 
            // dtpJoiningDate
            // 
            this.dtpJoiningDate.Dock = System.Windows.Forms.DockStyle.Fill;
            this.dtpJoiningDate.Font = new System.Drawing.Font("BurigangaKamalaOMJ", 10.2F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.dtpJoiningDate.Format = System.Windows.Forms.DateTimePickerFormat.Custom;
            this.dtpJoiningDate.Location = new System.Drawing.Point(151, 223);
            this.dtpJoiningDate.Margin = new System.Windows.Forms.Padding(4);
            this.dtpJoiningDate.Name = "dtpJoiningDate";
            this.dtpJoiningDate.Size = new System.Drawing.Size(441, 125);
            this.dtpJoiningDate.TabIndex = 6;
            this.dtpJoiningDate.Value = new System.DateTime(2022, 10, 7, 0, 0, 0, 0);
            // 
            // tableLayoutPanel2
            // 
            this.tableLayoutPanel2.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Right)));
            this.tableLayoutPanel2.ColumnCount = 2;
            this.tableLayoutPanel2.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 50F));
            this.tableLayoutPanel2.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 50F));
            this.tableLayoutPanel2.Controls.Add(this.btnRemove, 0, 1);
            this.tableLayoutPanel2.Controls.Add(this.btnClear, 1, 0);
            this.tableLayoutPanel2.Controls.Add(this.btnSave, 0, 0);
            this.tableLayoutPanel2.Controls.Add(this.btnHomePage, 1, 1);
            this.tableLayoutPanel2.Location = new System.Drawing.Point(724, 26);
            this.tableLayoutPanel2.Margin = new System.Windows.Forms.Padding(4);
            this.tableLayoutPanel2.Name = "tableLayoutPanel2";
            this.tableLayoutPanel2.RowCount = 2;
            this.tableLayoutPanel2.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 50F));
            this.tableLayoutPanel2.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 50F));
            this.tableLayoutPanel2.Size = new System.Drawing.Size(303, 186);
            this.tableLayoutPanel2.TabIndex = 1;
            // 
            // btnRemove
            // 
            this.btnRemove.Anchor = ((System.Windows.Forms.AnchorStyles)((((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom) 
            | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.btnRemove.Location = new System.Drawing.Point(4, 97);
            this.btnRemove.Margin = new System.Windows.Forms.Padding(4);
            this.btnRemove.Name = "btnRemove";
            this.btnRemove.Size = new System.Drawing.Size(143, 85);
            this.btnRemove.TabIndex = 2;
            this.btnRemove.Text = "Remove";
            this.btnRemove.UseVisualStyleBackColor = true;
            this.btnRemove.Click += new System.EventHandler(this.btnRemove_Click);
            // 
            // btnClear
            // 
            this.btnClear.Anchor = ((System.Windows.Forms.AnchorStyles)((((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom) 
            | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.btnClear.Location = new System.Drawing.Point(155, 4);
            this.btnClear.Margin = new System.Windows.Forms.Padding(4);
            this.btnClear.Name = "btnClear";
            this.btnClear.Size = new System.Drawing.Size(144, 85);
            this.btnClear.TabIndex = 1;
            this.btnClear.Text = "Clear";
            this.btnClear.UseVisualStyleBackColor = true;
            this.btnClear.Click += new System.EventHandler(this.btnClear_Click);
            // 
            // btnSave
            // 
            this.btnSave.Anchor = ((System.Windows.Forms.AnchorStyles)((((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom) 
            | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.btnSave.FlatStyle = System.Windows.Forms.FlatStyle.Popup;
            this.btnSave.Location = new System.Drawing.Point(4, 4);
            this.btnSave.Margin = new System.Windows.Forms.Padding(4);
            this.btnSave.Name = "btnSave";
            this.btnSave.Size = new System.Drawing.Size(143, 85);
            this.btnSave.TabIndex = 0;
            this.btnSave.Text = "Save";
            this.btnSave.UseVisualStyleBackColor = true;
            this.btnSave.Click += new System.EventHandler(this.btnSave_Click);
            // 
            // btnHomePage
            // 
            this.btnHomePage.Location = new System.Drawing.Point(155, 97);
            this.btnHomePage.Margin = new System.Windows.Forms.Padding(4);
            this.btnHomePage.Name = "btnHomePage";
            this.btnHomePage.Size = new System.Drawing.Size(144, 85);
            this.btnHomePage.TabIndex = 3;
            this.btnHomePage.Text = "HomePage";
            this.btnHomePage.UseVisualStyleBackColor = true;
            this.btnHomePage.Click += new System.EventHandler(this.btnHomePage_Click);
            // 
            // dgvEmployeeManagement
            // 
            this.dgvEmployeeManagement.AllowUserToAddRows = false;
            this.dgvEmployeeManagement.AllowUserToDeleteRows = false;
            this.dgvEmployeeManagement.Anchor = ((System.Windows.Forms.AnchorStyles)((((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom) 
            | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.dgvEmployeeManagement.AutoSizeColumnsMode = System.Windows.Forms.DataGridViewAutoSizeColumnsMode.Fill;
            this.dgvEmployeeManagement.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvEmployeeManagement.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.EmployeeId,
            this.EmployeeName,
            this.EmployeeSalary,
            this.PhoneNumber,
            this.JoiningDate});
            this.dgvEmployeeManagement.Location = new System.Drawing.Point(0, 315);
            this.dgvEmployeeManagement.Margin = new System.Windows.Forms.Padding(4);
            this.dgvEmployeeManagement.Name = "dgvEmployeeManagement";
            this.dgvEmployeeManagement.ReadOnly = true;
            this.dgvEmployeeManagement.RowHeadersWidth = 51;
            this.dgvEmployeeManagement.SelectionMode = System.Windows.Forms.DataGridViewSelectionMode.FullRowSelect;
            this.dgvEmployeeManagement.Size = new System.Drawing.Size(1067, 239);
            this.dgvEmployeeManagement.TabIndex = 2;
            this.dgvEmployeeManagement.DoubleClick += new System.EventHandler(this.dgvEmployeeManagement_DoubleClick);
            // 
            // EmployeeId
            // 
            this.EmployeeId.DataPropertyName = "UserId";
            this.EmployeeId.HeaderText = "Employee ID";
            this.EmployeeId.MinimumWidth = 6;
            this.EmployeeId.Name = "EmployeeId";
            this.EmployeeId.ReadOnly = true;
            // 
            // EmployeeName
            // 
            this.EmployeeName.DataPropertyName = "UserName";
            this.EmployeeName.HeaderText = "Employee Name ";
            this.EmployeeName.MinimumWidth = 6;
            this.EmployeeName.Name = "EmployeeName";
            this.EmployeeName.ReadOnly = true;
            // 
            // EmployeeSalary
            // 
            this.EmployeeSalary.DataPropertyName = "UserSalary";
            this.EmployeeSalary.HeaderText = "Employee Salary";
            this.EmployeeSalary.MinimumWidth = 6;
            this.EmployeeSalary.Name = "EmployeeSalary";
            this.EmployeeSalary.ReadOnly = true;
            // 
            // PhoneNumber
            // 
            this.PhoneNumber.DataPropertyName = "UserPhoneNumber";
            this.PhoneNumber.HeaderText = "Phone Number";
            this.PhoneNumber.MinimumWidth = 6;
            this.PhoneNumber.Name = "PhoneNumber";
            this.PhoneNumber.ReadOnly = true;
            // 
            // JoiningDate
            // 
            this.JoiningDate.DataPropertyName = "JoiningDate";
            this.JoiningDate.HeaderText = "Joining Date";
            this.JoiningDate.MinimumWidth = 6;
            this.JoiningDate.Name = "JoiningDate";
            this.JoiningDate.ReadOnly = true;
            // 
            // tableLayoutPanel3
            // 
            this.tableLayoutPanel3.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Right)));
            this.tableLayoutPanel3.ColumnCount = 1;
            this.tableLayoutPanel3.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 50F));
            this.tableLayoutPanel3.Controls.Add(this.btnShowInfo, 0, 0);
            this.tableLayoutPanel3.Location = new System.Drawing.Point(908, 271);
            this.tableLayoutPanel3.Margin = new System.Windows.Forms.Padding(4);
            this.tableLayoutPanel3.Name = "tableLayoutPanel3";
            this.tableLayoutPanel3.RowCount = 1;
            this.tableLayoutPanel3.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 50F));
            this.tableLayoutPanel3.Size = new System.Drawing.Size(143, 37);
            this.tableLayoutPanel3.TabIndex = 3;
            // 
            // btnShowInfo
            // 
            this.btnShowInfo.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.btnShowInfo.Location = new System.Drawing.Point(4, 4);
            this.btnShowInfo.Margin = new System.Windows.Forms.Padding(4);
            this.btnShowInfo.Name = "btnShowInfo";
            this.btnShowInfo.Size = new System.Drawing.Size(135, 28);
            this.btnShowInfo.TabIndex = 0;
            this.btnShowInfo.Text = "ShowInfo";
            this.btnShowInfo.UseVisualStyleBackColor = true;
            this.btnShowInfo.Click += new System.EventHandler(this.btnShowInfo_Click);
            // 
            // EmployeeManagement
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(8F, 16F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(1067, 554);
            this.Controls.Add(this.tableLayoutPanel3);
            this.Controls.Add(this.dgvEmployeeManagement);
            this.Controls.Add(this.tableLayoutPanel2);
            this.Controls.Add(this.tableLayoutPanel1);
            this.Margin = new System.Windows.Forms.Padding(4);
            this.Name = "EmployeeManagement";
            this.Text = "Employee Management";
            this.FormClosing += new System.Windows.Forms.FormClosingEventHandler(this.EmployeeManagement_FormClosing);
            this.Load += new System.EventHandler(this.EmployeeManagement_Load);
            this.tableLayoutPanel1.ResumeLayout(false);
            this.tableLayoutPanel1.PerformLayout();
            this.tableLayoutPanel2.ResumeLayout(false);
            ((System.ComponentModel.ISupportInitialize)(this.dgvEmployeeManagement)).EndInit();
            this.tableLayoutPanel3.ResumeLayout(false);
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel1;
        private System.Windows.Forms.Label lblEmployeeSalary;
        private System.Windows.Forms.Label lblJoiningDate;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.TextBox txtEmployeeSalary;
        private System.Windows.Forms.DateTimePicker dtpJoiningDate;
        private System.Windows.Forms.TextBox txtPhoneNumber;
        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel2;
        private System.Windows.Forms.Button btnRemove;
        private System.Windows.Forms.Button btnClear;
        private System.Windows.Forms.Button btnSave;
        private System.Windows.Forms.TextBox txtEmployeeId;
        private System.Windows.Forms.DataGridView dgvEmployeeManagement;
        private System.Windows.Forms.Button btnHomePage;
        private System.Windows.Forms.Label lblEmployeeName;
        private System.Windows.Forms.TextBox txtEmpName;
        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel3;
        private System.Windows.Forms.Button btnShowInfo;
        private System.Windows.Forms.DataGridViewTextBoxColumn EmployeeId;
        private System.Windows.Forms.DataGridViewTextBoxColumn EmployeeName;
        private System.Windows.Forms.DataGridViewTextBoxColumn EmployeeSalary;
        private System.Windows.Forms.DataGridViewTextBoxColumn PhoneNumber;
        private System.Windows.Forms.DataGridViewTextBoxColumn JoiningDate;
    }
}