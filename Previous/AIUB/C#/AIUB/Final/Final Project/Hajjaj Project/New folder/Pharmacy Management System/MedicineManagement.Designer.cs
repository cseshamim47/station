namespace Pharmacy_Management_System
{
    partial class MedicineManagement
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
            this.dtpMedicineExpireDate = new System.Windows.Forms.DateTimePicker();
            this.txtMedicinePricePerUnit = new System.Windows.Forms.TextBox();
            this.txtMedicineQuantity = new System.Windows.Forms.TextBox();
            this.txtMedicineName = new System.Windows.Forms.TextBox();
            this.lblMedicineQuantity = new System.Windows.Forms.Label();
            this.lblMedicineName = new System.Windows.Forms.Label();
            this.lblMedicinePricePerUnit = new System.Windows.Forms.Label();
            this.lblMedicineManufacturingDate = new System.Windows.Forms.Label();
            this.lblMedicineExpireDate = new System.Windows.Forms.Label();
            this.txtMedicineId = new System.Windows.Forms.TextBox();
            this.dtpMedicineManufacturingDate = new System.Windows.Forms.DateTimePicker();
            this.lblMedicineId = new System.Windows.Forms.Label();
            this.tableLayoutPanel2 = new System.Windows.Forms.TableLayoutPanel();
            this.btnRemove = new System.Windows.Forms.Button();
            this.btnClear = new System.Windows.Forms.Button();
            this.btnSave = new System.Windows.Forms.Button();
            this.btnHomePage = new System.Windows.Forms.Button();
            this.tableLayoutPanel3 = new System.Windows.Forms.TableLayoutPanel();
            this.btnShowInfo = new System.Windows.Forms.Button();
            this.dgvMedicineManagement = new System.Windows.Forms.DataGridView();
            this.MedicineId = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.MedicineName = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.MedicineQuantity = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.MedicinePricePerUnit = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.MedicineManufacturingDate = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.MedicineExpireDate = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.tableLayoutPanel7 = new System.Windows.Forms.TableLayoutPanel();
            this.lblSearchByName = new System.Windows.Forms.Label();
            this.tableLayoutPanel8 = new System.Windows.Forms.TableLayoutPanel();
            this.txtSearchByName = new System.Windows.Forms.TextBox();
            this.tableLayoutPanel1.SuspendLayout();
            this.tableLayoutPanel2.SuspendLayout();
            this.tableLayoutPanel3.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dgvMedicineManagement)).BeginInit();
            this.tableLayoutPanel7.SuspendLayout();
            this.tableLayoutPanel8.SuspendLayout();
            this.SuspendLayout();
            // 
            // tableLayoutPanel1
            // 
            this.tableLayoutPanel1.Anchor = ((System.Windows.Forms.AnchorStyles)(((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.tableLayoutPanel1.ColumnCount = 2;
            this.tableLayoutPanel1.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 54.78261F));
            this.tableLayoutPanel1.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 45.21739F));
            this.tableLayoutPanel1.Controls.Add(this.dtpMedicineExpireDate, 1, 5);
            this.tableLayoutPanel1.Controls.Add(this.txtMedicinePricePerUnit, 1, 3);
            this.tableLayoutPanel1.Controls.Add(this.txtMedicineQuantity, 1, 2);
            this.tableLayoutPanel1.Controls.Add(this.txtMedicineName, 1, 1);
            this.tableLayoutPanel1.Controls.Add(this.lblMedicineQuantity, 0, 2);
            this.tableLayoutPanel1.Controls.Add(this.lblMedicineName, 0, 1);
            this.tableLayoutPanel1.Controls.Add(this.lblMedicinePricePerUnit, 0, 3);
            this.tableLayoutPanel1.Controls.Add(this.lblMedicineManufacturingDate, 0, 4);
            this.tableLayoutPanel1.Controls.Add(this.lblMedicineExpireDate, 0, 5);
            this.tableLayoutPanel1.Controls.Add(this.txtMedicineId, 1, 0);
            this.tableLayoutPanel1.Controls.Add(this.dtpMedicineManufacturingDate, 1, 4);
            this.tableLayoutPanel1.Controls.Add(this.lblMedicineId, 0, 0);
            this.tableLayoutPanel1.Location = new System.Drawing.Point(16, 15);
            this.tableLayoutPanel1.Margin = new System.Windows.Forms.Padding(4);
            this.tableLayoutPanel1.Name = "tableLayoutPanel1";
            this.tableLayoutPanel1.RowCount = 6;
            this.tableLayoutPanel1.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 16.66667F));
            this.tableLayoutPanel1.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 16.10169F));
            this.tableLayoutPanel1.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 16.94915F));
            this.tableLayoutPanel1.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 16.66667F));
            this.tableLayoutPanel1.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 16.66667F));
            this.tableLayoutPanel1.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 16.66667F));
            this.tableLayoutPanel1.Size = new System.Drawing.Size(561, 290);
            this.tableLayoutPanel1.TabIndex = 0;
            // 
            // dtpMedicineExpireDate
            // 
            this.dtpMedicineExpireDate.Location = new System.Drawing.Point(311, 243);
            this.dtpMedicineExpireDate.Margin = new System.Windows.Forms.Padding(4);
            this.dtpMedicineExpireDate.Name = "dtpMedicineExpireDate";
            this.dtpMedicineExpireDate.Size = new System.Drawing.Size(245, 22);
            this.dtpMedicineExpireDate.TabIndex = 11;
            // 
            // txtMedicinePricePerUnit
            // 
            this.txtMedicinePricePerUnit.Dock = System.Windows.Forms.DockStyle.Fill;
            this.txtMedicinePricePerUnit.Location = new System.Drawing.Point(311, 147);
            this.txtMedicinePricePerUnit.Margin = new System.Windows.Forms.Padding(4);
            this.txtMedicinePricePerUnit.Multiline = true;
            this.txtMedicinePricePerUnit.Name = "txtMedicinePricePerUnit";
            this.txtMedicinePricePerUnit.Size = new System.Drawing.Size(246, 40);
            this.txtMedicinePricePerUnit.TabIndex = 9;
            // 
            // txtMedicineQuantity
            // 
            this.txtMedicineQuantity.Dock = System.Windows.Forms.DockStyle.Fill;
            this.txtMedicineQuantity.Location = new System.Drawing.Point(311, 98);
            this.txtMedicineQuantity.Margin = new System.Windows.Forms.Padding(4);
            this.txtMedicineQuantity.Multiline = true;
            this.txtMedicineQuantity.Name = "txtMedicineQuantity";
            this.txtMedicineQuantity.Size = new System.Drawing.Size(246, 41);
            this.txtMedicineQuantity.TabIndex = 8;
            // 
            // txtMedicineName
            // 
            this.txtMedicineName.Dock = System.Windows.Forms.DockStyle.Fill;
            this.txtMedicineName.Location = new System.Drawing.Point(311, 52);
            this.txtMedicineName.Margin = new System.Windows.Forms.Padding(4);
            this.txtMedicineName.Multiline = true;
            this.txtMedicineName.Name = "txtMedicineName";
            this.txtMedicineName.Size = new System.Drawing.Size(246, 38);
            this.txtMedicineName.TabIndex = 7;
            // 
            // lblMedicineQuantity
            // 
            this.lblMedicineQuantity.AutoSize = true;
            this.lblMedicineQuantity.Dock = System.Windows.Forms.DockStyle.Fill;
            this.lblMedicineQuantity.Font = new System.Drawing.Font("Microsoft Sans Serif", 12.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblMedicineQuantity.Location = new System.Drawing.Point(4, 94);
            this.lblMedicineQuantity.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.lblMedicineQuantity.Name = "lblMedicineQuantity";
            this.lblMedicineQuantity.Size = new System.Drawing.Size(299, 49);
            this.lblMedicineQuantity.TabIndex = 4;
            this.lblMedicineQuantity.Text = "MedicineQuantity";
            // 
            // lblMedicineName
            // 
            this.lblMedicineName.AutoSize = true;
            this.lblMedicineName.Dock = System.Windows.Forms.DockStyle.Fill;
            this.lblMedicineName.Font = new System.Drawing.Font("Microsoft Sans Serif", 12.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblMedicineName.Location = new System.Drawing.Point(4, 48);
            this.lblMedicineName.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.lblMedicineName.Name = "lblMedicineName";
            this.lblMedicineName.Size = new System.Drawing.Size(299, 46);
            this.lblMedicineName.TabIndex = 2;
            this.lblMedicineName.Text = "MedicineName";
            // 
            // lblMedicinePricePerUnit
            // 
            this.lblMedicinePricePerUnit.AutoSize = true;
            this.lblMedicinePricePerUnit.Dock = System.Windows.Forms.DockStyle.Fill;
            this.lblMedicinePricePerUnit.Font = new System.Drawing.Font("Microsoft Sans Serif", 12.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblMedicinePricePerUnit.Location = new System.Drawing.Point(4, 143);
            this.lblMedicinePricePerUnit.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.lblMedicinePricePerUnit.Name = "lblMedicinePricePerUnit";
            this.lblMedicinePricePerUnit.Size = new System.Drawing.Size(299, 48);
            this.lblMedicinePricePerUnit.TabIndex = 1;
            this.lblMedicinePricePerUnit.Text = "MedicinePricePerUnit";
            this.lblMedicinePricePerUnit.Click += new System.EventHandler(this.label2_Click);
            // 
            // lblMedicineManufacturingDate
            // 
            this.lblMedicineManufacturingDate.AutoSize = true;
            this.lblMedicineManufacturingDate.Dock = System.Windows.Forms.DockStyle.Fill;
            this.lblMedicineManufacturingDate.Font = new System.Drawing.Font("Microsoft Sans Serif", 12.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblMedicineManufacturingDate.Location = new System.Drawing.Point(4, 191);
            this.lblMedicineManufacturingDate.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.lblMedicineManufacturingDate.Name = "lblMedicineManufacturingDate";
            this.lblMedicineManufacturingDate.Size = new System.Drawing.Size(299, 48);
            this.lblMedicineManufacturingDate.TabIndex = 3;
            this.lblMedicineManufacturingDate.Text = "MedicineManufacturingDate";
            // 
            // lblMedicineExpireDate
            // 
            this.lblMedicineExpireDate.AutoSize = true;
            this.lblMedicineExpireDate.Dock = System.Windows.Forms.DockStyle.Fill;
            this.lblMedicineExpireDate.Font = new System.Drawing.Font("Microsoft Sans Serif", 12.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblMedicineExpireDate.Location = new System.Drawing.Point(4, 239);
            this.lblMedicineExpireDate.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.lblMedicineExpireDate.Name = "lblMedicineExpireDate";
            this.lblMedicineExpireDate.Size = new System.Drawing.Size(299, 51);
            this.lblMedicineExpireDate.TabIndex = 5;
            this.lblMedicineExpireDate.Text = "MedicineExpireDate";
            // 
            // txtMedicineId
            // 
            this.txtMedicineId.Dock = System.Windows.Forms.DockStyle.Fill;
            this.txtMedicineId.Enabled = false;
            this.txtMedicineId.Location = new System.Drawing.Point(311, 4);
            this.txtMedicineId.Margin = new System.Windows.Forms.Padding(4);
            this.txtMedicineId.Multiline = true;
            this.txtMedicineId.Name = "txtMedicineId";
            this.txtMedicineId.Size = new System.Drawing.Size(246, 40);
            this.txtMedicineId.TabIndex = 6;
            // 
            // dtpMedicineManufacturingDate
            // 
            this.dtpMedicineManufacturingDate.CustomFormat = "";
            this.dtpMedicineManufacturingDate.Location = new System.Drawing.Point(311, 195);
            this.dtpMedicineManufacturingDate.Margin = new System.Windows.Forms.Padding(4);
            this.dtpMedicineManufacturingDate.Name = "dtpMedicineManufacturingDate";
            this.dtpMedicineManufacturingDate.Size = new System.Drawing.Size(245, 22);
            this.dtpMedicineManufacturingDate.TabIndex = 10;
            // 
            // lblMedicineId
            // 
            this.lblMedicineId.AutoSize = true;
            this.lblMedicineId.Dock = System.Windows.Forms.DockStyle.Fill;
            this.lblMedicineId.Font = new System.Drawing.Font("Microsoft Sans Serif", 12.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblMedicineId.Location = new System.Drawing.Point(4, 0);
            this.lblMedicineId.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.lblMedicineId.Name = "lblMedicineId";
            this.lblMedicineId.Size = new System.Drawing.Size(299, 48);
            this.lblMedicineId.TabIndex = 0;
            this.lblMedicineId.Text = "MedicineId";
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
            this.tableLayoutPanel2.Location = new System.Drawing.Point(748, 75);
            this.tableLayoutPanel2.Margin = new System.Windows.Forms.Padding(4);
            this.tableLayoutPanel2.Name = "tableLayoutPanel2";
            this.tableLayoutPanel2.RowCount = 2;
            this.tableLayoutPanel2.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 50F));
            this.tableLayoutPanel2.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 50F));
            this.tableLayoutPanel2.Size = new System.Drawing.Size(303, 186);
            this.tableLayoutPanel2.TabIndex = 2;
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
            // tableLayoutPanel3
            // 
            this.tableLayoutPanel3.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Right)));
            this.tableLayoutPanel3.ColumnCount = 1;
            this.tableLayoutPanel3.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 50F));
            this.tableLayoutPanel3.Controls.Add(this.btnShowInfo, 0, 0);
            this.tableLayoutPanel3.Location = new System.Drawing.Point(909, 294);
            this.tableLayoutPanel3.Margin = new System.Windows.Forms.Padding(4);
            this.tableLayoutPanel3.Name = "tableLayoutPanel3";
            this.tableLayoutPanel3.RowCount = 1;
            this.tableLayoutPanel3.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 50F));
            this.tableLayoutPanel3.Size = new System.Drawing.Size(141, 37);
            this.tableLayoutPanel3.TabIndex = 5;
            // 
            // btnShowInfo
            // 
            this.btnShowInfo.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.btnShowInfo.Location = new System.Drawing.Point(4, 4);
            this.btnShowInfo.Margin = new System.Windows.Forms.Padding(4);
            this.btnShowInfo.Name = "btnShowInfo";
            this.btnShowInfo.Size = new System.Drawing.Size(133, 29);
            this.btnShowInfo.TabIndex = 0;
            this.btnShowInfo.Text = "ShowInfo";
            this.btnShowInfo.UseVisualStyleBackColor = true;
            this.btnShowInfo.Click += new System.EventHandler(this.btnShowInfo_Click);
            // 
            // dgvMedicineManagement
            // 
            this.dgvMedicineManagement.AllowUserToAddRows = false;
            this.dgvMedicineManagement.AllowUserToDeleteRows = false;
            this.dgvMedicineManagement.Anchor = ((System.Windows.Forms.AnchorStyles)((((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom) 
            | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.dgvMedicineManagement.AutoSizeColumnsMode = System.Windows.Forms.DataGridViewAutoSizeColumnsMode.Fill;
            this.dgvMedicineManagement.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvMedicineManagement.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.MedicineId,
            this.MedicineName,
            this.MedicineQuantity,
            this.MedicinePricePerUnit,
            this.MedicineManufacturingDate,
            this.MedicineExpireDate});
            this.dgvMedicineManagement.Location = new System.Drawing.Point(0, 375);
            this.dgvMedicineManagement.Margin = new System.Windows.Forms.Padding(4);
            this.dgvMedicineManagement.Name = "dgvMedicineManagement";
            this.dgvMedicineManagement.ReadOnly = true;
            this.dgvMedicineManagement.RowHeadersWidth = 51;
            this.dgvMedicineManagement.SelectionMode = System.Windows.Forms.DataGridViewSelectionMode.FullRowSelect;
            this.dgvMedicineManagement.Size = new System.Drawing.Size(1067, 181);
            this.dgvMedicineManagement.TabIndex = 4;
            this.dgvMedicineManagement.DoubleClick += new System.EventHandler(this.dgvMedicineManagement_DoubleClick);
            // 
            // MedicineId
            // 
            this.MedicineId.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.MedicineId.DataPropertyName = "MedicineId";
            this.MedicineId.HeaderText = "MedicineId";
            this.MedicineId.MinimumWidth = 6;
            this.MedicineId.Name = "MedicineId";
            this.MedicineId.ReadOnly = true;
            // 
            // MedicineName
            // 
            this.MedicineName.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.MedicineName.DataPropertyName = "MedicineName";
            this.MedicineName.HeaderText = "MedicineName";
            this.MedicineName.MinimumWidth = 6;
            this.MedicineName.Name = "MedicineName";
            this.MedicineName.ReadOnly = true;
            // 
            // MedicineQuantity
            // 
            this.MedicineQuantity.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.MedicineQuantity.DataPropertyName = "MedicineQuantity";
            this.MedicineQuantity.HeaderText = "MedicineQuantity";
            this.MedicineQuantity.MinimumWidth = 6;
            this.MedicineQuantity.Name = "MedicineQuantity";
            this.MedicineQuantity.ReadOnly = true;
            // 
            // MedicinePricePerUnit
            // 
            this.MedicinePricePerUnit.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.MedicinePricePerUnit.DataPropertyName = "MedicinePricePerUnit";
            this.MedicinePricePerUnit.HeaderText = "MedicinePricePerUnit";
            this.MedicinePricePerUnit.MinimumWidth = 6;
            this.MedicinePricePerUnit.Name = "MedicinePricePerUnit";
            this.MedicinePricePerUnit.ReadOnly = true;
            // 
            // MedicineManufacturingDate
            // 
            this.MedicineManufacturingDate.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.MedicineManufacturingDate.DataPropertyName = "MedicineManufacturingDate";
            this.MedicineManufacturingDate.HeaderText = "MedicineManufacturingDate";
            this.MedicineManufacturingDate.MinimumWidth = 6;
            this.MedicineManufacturingDate.Name = "MedicineManufacturingDate";
            this.MedicineManufacturingDate.ReadOnly = true;
            // 
            // MedicineExpireDate
            // 
            this.MedicineExpireDate.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.MedicineExpireDate.DataPropertyName = "MedicineExpireDate";
            this.MedicineExpireDate.HeaderText = "MedicineExpireDate";
            this.MedicineExpireDate.MinimumWidth = 6;
            this.MedicineExpireDate.Name = "MedicineExpireDate";
            this.MedicineExpireDate.ReadOnly = true;
            // 
            // tableLayoutPanel7
            // 
            this.tableLayoutPanel7.ColumnCount = 1;
            this.tableLayoutPanel7.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 50F));
            this.tableLayoutPanel7.Controls.Add(this.lblSearchByName, 0, 0);
            this.tableLayoutPanel7.Location = new System.Drawing.Point(25, 308);
            this.tableLayoutPanel7.Margin = new System.Windows.Forms.Padding(4);
            this.tableLayoutPanel7.Name = "tableLayoutPanel7";
            this.tableLayoutPanel7.RowCount = 1;
            this.tableLayoutPanel7.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 50F));
            this.tableLayoutPanel7.Size = new System.Drawing.Size(197, 23);
            this.tableLayoutPanel7.TabIndex = 10;
            // 
            // lblSearchByName
            // 
            this.lblSearchByName.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.lblSearchByName.AutoSize = true;
            this.lblSearchByName.Location = new System.Drawing.Point(29, 3);
            this.lblSearchByName.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.lblSearchByName.Name = "lblSearchByName";
            this.lblSearchByName.Size = new System.Drawing.Size(139, 16);
            this.lblSearchByName.TabIndex = 0;
            this.lblSearchByName.Text = "Search by Name or ID";
            // 
            // tableLayoutPanel8
            // 
            this.tableLayoutPanel8.ColumnCount = 1;
            this.tableLayoutPanel8.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 50F));
            this.tableLayoutPanel8.Controls.Add(this.txtSearchByName, 0, 0);
            this.tableLayoutPanel8.Location = new System.Drawing.Point(25, 332);
            this.tableLayoutPanel8.Margin = new System.Windows.Forms.Padding(4);
            this.tableLayoutPanel8.Name = "tableLayoutPanel8";
            this.tableLayoutPanel8.RowCount = 1;
            this.tableLayoutPanel8.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 50F));
            this.tableLayoutPanel8.Size = new System.Drawing.Size(197, 36);
            this.tableLayoutPanel8.TabIndex = 9;
            // 
            // txtSearchByName
            // 
            this.txtSearchByName.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.txtSearchByName.Location = new System.Drawing.Point(4, 4);
            this.txtSearchByName.Margin = new System.Windows.Forms.Padding(4);
            this.txtSearchByName.Multiline = true;
            this.txtSearchByName.Name = "txtSearchByName";
            this.txtSearchByName.Size = new System.Drawing.Size(188, 27);
            this.txtSearchByName.TabIndex = 0;
            this.txtSearchByName.TextChanged += new System.EventHandler(this.txtSearchByName_TextChanged);
            // 
            // MedicineManagement
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(8F, 16F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(1067, 554);
            this.Controls.Add(this.tableLayoutPanel7);
            this.Controls.Add(this.tableLayoutPanel8);
            this.Controls.Add(this.tableLayoutPanel3);
            this.Controls.Add(this.dgvMedicineManagement);
            this.Controls.Add(this.tableLayoutPanel2);
            this.Controls.Add(this.tableLayoutPanel1);
            this.Margin = new System.Windows.Forms.Padding(4);
            this.Name = "MedicineManagement";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "MedicineManagement";
            this.FormClosing += new System.Windows.Forms.FormClosingEventHandler(this.MedicineManagement_FormClosing);
            this.Load += new System.EventHandler(this.MedicineManagement_Load);
            this.tableLayoutPanel1.ResumeLayout(false);
            this.tableLayoutPanel1.PerformLayout();
            this.tableLayoutPanel2.ResumeLayout(false);
            this.tableLayoutPanel3.ResumeLayout(false);
            ((System.ComponentModel.ISupportInitialize)(this.dgvMedicineManagement)).EndInit();
            this.tableLayoutPanel7.ResumeLayout(false);
            this.tableLayoutPanel7.PerformLayout();
            this.tableLayoutPanel8.ResumeLayout(false);
            this.tableLayoutPanel8.PerformLayout();
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel1;
        private System.Windows.Forms.Label lblMedicineExpireDate;
        private System.Windows.Forms.Label lblMedicineQuantity;
        private System.Windows.Forms.Label lblMedicineManufacturingDate;
        private System.Windows.Forms.Label lblMedicineName;
        private System.Windows.Forms.Label lblMedicinePricePerUnit;
        private System.Windows.Forms.Label lblMedicineId;
        private System.Windows.Forms.DateTimePicker dtpMedicineExpireDate;
        private System.Windows.Forms.TextBox txtMedicinePricePerUnit;
        private System.Windows.Forms.TextBox txtMedicineQuantity;
        private System.Windows.Forms.TextBox txtMedicineName;
        private System.Windows.Forms.TextBox txtMedicineId;
        private System.Windows.Forms.DateTimePicker dtpMedicineManufacturingDate;
        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel2;
        private System.Windows.Forms.Button btnRemove;
        private System.Windows.Forms.Button btnClear;
        private System.Windows.Forms.Button btnSave;
        private System.Windows.Forms.Button btnHomePage;
        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel3;
        private System.Windows.Forms.Button btnShowInfo;
        private System.Windows.Forms.DataGridView dgvMedicineManagement;
        private System.Windows.Forms.DataGridViewTextBoxColumn MedicineId;
        private System.Windows.Forms.DataGridViewTextBoxColumn MedicineName;
        private System.Windows.Forms.DataGridViewTextBoxColumn MedicineQuantity;
        private System.Windows.Forms.DataGridViewTextBoxColumn MedicinePricePerUnit;
        private System.Windows.Forms.DataGridViewTextBoxColumn MedicineManufacturingDate;
        private System.Windows.Forms.DataGridViewTextBoxColumn MedicineExpireDate;
        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel7;
        private System.Windows.Forms.Label lblSearchByName;
        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel8;
        private System.Windows.Forms.TextBox txtSearchByName;
    }
}