namespace Pharmacy_Management_System
{
    partial class OrderMedicine
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
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(OrderMedicine));
            this.tableLayoutPanel1 = new System.Windows.Forms.TableLayoutPanel();
            this.dgvMedicineManagement = new System.Windows.Forms.DataGridView();
            this.MedicineId = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.MedicineName = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.MedicineQuantity = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.MedicinePricePerUnit = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.tableLayoutPanel3 = new System.Windows.Forms.TableLayoutPanel();
            this.lblSearchByName = new System.Windows.Forms.Label();
            this.txtSearchByName = new System.Windows.Forms.TextBox();
            this.btnBack = new System.Windows.Forms.Button();
            this.dgvOrderList = new System.Windows.Forms.DataGridView();
            this.OrderedMedicineName = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.OrderedPerUnitPrice = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.OrderedQuantity = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.OrderedPrice = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.AddedMedicineId = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.tableLayoutPanel2 = new System.Windows.Forms.TableLayoutPanel();
            this.label2 = new System.Windows.Forms.Label();
            this.txtBoxQuantity = new System.Windows.Forms.TextBox();
            this.btnUpdate = new System.Windows.Forms.Button();
            this.btnConfirmOrder = new System.Windows.Forms.Button();
            this.txtPrintTitle = new System.Windows.Forms.Label();
            this.printPreviewDialog1 = new System.Windows.Forms.PrintPreviewDialog();
            this.printDocument1 = new System.Drawing.Printing.PrintDocument();
            this.tableLayoutPanel1.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dgvMedicineManagement)).BeginInit();
            this.tableLayoutPanel3.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dgvOrderList)).BeginInit();
            this.tableLayoutPanel2.SuspendLayout();
            this.SuspendLayout();
            // 
            // tableLayoutPanel1
            // 
            this.tableLayoutPanel1.Anchor = ((System.Windows.Forms.AnchorStyles)((((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom) 
            | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.tableLayoutPanel1.BackColor = System.Drawing.SystemColors.Control;
            this.tableLayoutPanel1.ColumnCount = 2;
            this.tableLayoutPanel1.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 50F));
            this.tableLayoutPanel1.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 50F));
            this.tableLayoutPanel1.Controls.Add(this.dgvMedicineManagement, 0, 1);
            this.tableLayoutPanel1.Controls.Add(this.tableLayoutPanel3, 0, 0);
            this.tableLayoutPanel1.Controls.Add(this.dgvOrderList, 1, 1);
            this.tableLayoutPanel1.Controls.Add(this.tableLayoutPanel2, 1, 0);
            this.tableLayoutPanel1.Location = new System.Drawing.Point(4, 0);
            this.tableLayoutPanel1.Margin = new System.Windows.Forms.Padding(4);
            this.tableLayoutPanel1.Name = "tableLayoutPanel1";
            this.tableLayoutPanel1.RowCount = 2;
            this.tableLayoutPanel1.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 36.00973F));
            this.tableLayoutPanel1.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 63.99027F));
            this.tableLayoutPanel1.Size = new System.Drawing.Size(1031, 506);
            this.tableLayoutPanel1.TabIndex = 0;
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
            this.MedicinePricePerUnit});
            this.dgvMedicineManagement.Location = new System.Drawing.Point(4, 186);
            this.dgvMedicineManagement.Margin = new System.Windows.Forms.Padding(4);
            this.dgvMedicineManagement.MultiSelect = false;
            this.dgvMedicineManagement.Name = "dgvMedicineManagement";
            this.dgvMedicineManagement.ReadOnly = true;
            this.dgvMedicineManagement.RowHeadersWidth = 51;
            this.dgvMedicineManagement.SelectionMode = System.Windows.Forms.DataGridViewSelectionMode.FullRowSelect;
            this.dgvMedicineManagement.Size = new System.Drawing.Size(507, 316);
            this.dgvMedicineManagement.TabIndex = 5;
            this.dgvMedicineManagement.DoubleClick += new System.EventHandler(this.dgvMedicineManagement_DoubleClick_1);
            // 
            // MedicineId
            // 
            this.MedicineId.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.MedicineId.DataPropertyName = "MedicineId";
            this.MedicineId.HeaderText = "ID";
            this.MedicineId.MinimumWidth = 6;
            this.MedicineId.Name = "MedicineId";
            this.MedicineId.ReadOnly = true;
            // 
            // MedicineName
            // 
            this.MedicineName.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.MedicineName.DataPropertyName = "MedicineName";
            this.MedicineName.HeaderText = "Name";
            this.MedicineName.MinimumWidth = 6;
            this.MedicineName.Name = "MedicineName";
            this.MedicineName.ReadOnly = true;
            // 
            // MedicineQuantity
            // 
            this.MedicineQuantity.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.MedicineQuantity.DataPropertyName = "MedicineQuantity";
            this.MedicineQuantity.HeaderText = "Quantity";
            this.MedicineQuantity.MinimumWidth = 6;
            this.MedicineQuantity.Name = "MedicineQuantity";
            this.MedicineQuantity.ReadOnly = true;
            // 
            // MedicinePricePerUnit
            // 
            this.MedicinePricePerUnit.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.MedicinePricePerUnit.DataPropertyName = "MedicinePricePerUnit";
            this.MedicinePricePerUnit.HeaderText = "Price Per Unit";
            this.MedicinePricePerUnit.MinimumWidth = 6;
            this.MedicinePricePerUnit.Name = "MedicinePricePerUnit";
            this.MedicinePricePerUnit.ReadOnly = true;
            // 
            // tableLayoutPanel3
            // 
            this.tableLayoutPanel3.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Left)));
            this.tableLayoutPanel3.ColumnCount = 2;
            this.tableLayoutPanel3.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 42.27848F));
            this.tableLayoutPanel3.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 57.72152F));
            this.tableLayoutPanel3.Controls.Add(this.lblSearchByName, 0, 2);
            this.tableLayoutPanel3.Controls.Add(this.txtSearchByName, 1, 2);
            this.tableLayoutPanel3.Controls.Add(this.btnBack, 0, 0);
            this.tableLayoutPanel3.Location = new System.Drawing.Point(4, 18);
            this.tableLayoutPanel3.Margin = new System.Windows.Forms.Padding(4);
            this.tableLayoutPanel3.Name = "tableLayoutPanel3";
            this.tableLayoutPanel3.RowCount = 3;
            this.tableLayoutPanel3.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 50F));
            this.tableLayoutPanel3.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Absolute, 55F));
            this.tableLayoutPanel3.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Absolute, 49F));
            this.tableLayoutPanel3.Size = new System.Drawing.Size(395, 160);
            this.tableLayoutPanel3.TabIndex = 6;
            // 
            // lblSearchByName
            // 
            this.lblSearchByName.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.lblSearchByName.AutoSize = true;
            this.lblSearchByName.Location = new System.Drawing.Point(14, 127);
            this.lblSearchByName.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.lblSearchByName.Name = "lblSearchByName";
            this.lblSearchByName.Size = new System.Drawing.Size(139, 16);
            this.lblSearchByName.TabIndex = 2;
            this.lblSearchByName.Text = "Search by Name or ID";
            // 
            // txtSearchByName
            // 
            this.txtSearchByName.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.txtSearchByName.Location = new System.Drawing.Point(187, 122);
            this.txtSearchByName.Margin = new System.Windows.Forms.Padding(4);
            this.txtSearchByName.Multiline = true;
            this.txtSearchByName.Name = "txtSearchByName";
            this.txtSearchByName.Size = new System.Drawing.Size(188, 27);
            this.txtSearchByName.TabIndex = 1;
            this.txtSearchByName.TextChanged += new System.EventHandler(this.txtSearchByName_TextChanged);
            // 
            // btnBack
            // 
            this.btnBack.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Left)));
            this.btnBack.Location = new System.Drawing.Point(3, 12);
            this.btnBack.Name = "btnBack";
            this.btnBack.Size = new System.Drawing.Size(146, 41);
            this.btnBack.TabIndex = 0;
            this.btnBack.Text = "Back";
            this.btnBack.UseVisualStyleBackColor = true;
            this.btnBack.Click += new System.EventHandler(this.btnBack_Click);
            // 
            // dgvOrderList
            // 
            this.dgvOrderList.AllowUserToAddRows = false;
            this.dgvOrderList.AllowUserToDeleteRows = false;
            this.dgvOrderList.Anchor = ((System.Windows.Forms.AnchorStyles)((((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom) 
            | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.dgvOrderList.AutoSizeColumnsMode = System.Windows.Forms.DataGridViewAutoSizeColumnsMode.Fill;
            this.dgvOrderList.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvOrderList.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.OrderedMedicineName,
            this.OrderedPerUnitPrice,
            this.OrderedQuantity,
            this.OrderedPrice,
            this.AddedMedicineId});
            this.dgvOrderList.Location = new System.Drawing.Point(519, 186);
            this.dgvOrderList.Margin = new System.Windows.Forms.Padding(4);
            this.dgvOrderList.MultiSelect = false;
            this.dgvOrderList.Name = "dgvOrderList";
            this.dgvOrderList.ReadOnly = true;
            this.dgvOrderList.RowHeadersWidth = 51;
            this.dgvOrderList.SelectionMode = System.Windows.Forms.DataGridViewSelectionMode.FullRowSelect;
            this.dgvOrderList.Size = new System.Drawing.Size(508, 316);
            this.dgvOrderList.TabIndex = 7;
            this.dgvOrderList.DoubleClick += new System.EventHandler(this.dgvOrderList_DoubleClick);
            // 
            // OrderedMedicineName
            // 
            this.OrderedMedicineName.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.OrderedMedicineName.DataPropertyName = "OrderedMedicineName";
            this.OrderedMedicineName.HeaderText = "Medicine Name";
            this.OrderedMedicineName.MinimumWidth = 6;
            this.OrderedMedicineName.Name = "OrderedMedicineName";
            this.OrderedMedicineName.ReadOnly = true;
            // 
            // OrderedPerUnitPrice
            // 
            this.OrderedPerUnitPrice.DataPropertyName = "OrderedPerUnitPrice";
            this.OrderedPerUnitPrice.HeaderText = "Per Unit Price";
            this.OrderedPerUnitPrice.MinimumWidth = 6;
            this.OrderedPerUnitPrice.Name = "OrderedPerUnitPrice";
            this.OrderedPerUnitPrice.ReadOnly = true;
            // 
            // OrderedQuantity
            // 
            this.OrderedQuantity.DataPropertyName = "OrderedQuantity";
            this.OrderedQuantity.HeaderText = "Quantity";
            this.OrderedQuantity.MinimumWidth = 6;
            this.OrderedQuantity.Name = "OrderedQuantity";
            this.OrderedQuantity.ReadOnly = true;
            // 
            // OrderedPrice
            // 
            this.OrderedPrice.DataPropertyName = "OrderedPrice";
            this.OrderedPrice.HeaderText = "Price";
            this.OrderedPrice.MinimumWidth = 6;
            this.OrderedPrice.Name = "OrderedPrice";
            this.OrderedPrice.ReadOnly = true;
            // 
            // AddedMedicineId
            // 
            this.AddedMedicineId.HeaderText = "AddedMedicineId";
            this.AddedMedicineId.MinimumWidth = 6;
            this.AddedMedicineId.Name = "AddedMedicineId";
            this.AddedMedicineId.ReadOnly = true;
            this.AddedMedicineId.Visible = false;
            // 
            // tableLayoutPanel2
            // 
            this.tableLayoutPanel2.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Right)));
            this.tableLayoutPanel2.ColumnCount = 3;
            this.tableLayoutPanel2.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 60.51081F));
            this.tableLayoutPanel2.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 1.571709F));
            this.tableLayoutPanel2.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 37.91748F));
            this.tableLayoutPanel2.Controls.Add(this.label2, 0, 2);
            this.tableLayoutPanel2.Controls.Add(this.txtBoxQuantity, 2, 2);
            this.tableLayoutPanel2.Controls.Add(this.btnUpdate, 2, 3);
            this.tableLayoutPanel2.Controls.Add(this.btnConfirmOrder, 0, 3);
            this.tableLayoutPanel2.Controls.Add(this.txtPrintTitle, 0, 0);
            this.tableLayoutPanel2.Location = new System.Drawing.Point(519, 3);
            this.tableLayoutPanel2.Name = "tableLayoutPanel2";
            this.tableLayoutPanel2.RowCount = 4;
            this.tableLayoutPanel2.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 45.74468F));
            this.tableLayoutPanel2.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 54.25532F));
            this.tableLayoutPanel2.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Absolute, 49F));
            this.tableLayoutPanel2.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Absolute, 61F));
            this.tableLayoutPanel2.Size = new System.Drawing.Size(509, 176);
            this.tableLayoutPanel2.TabIndex = 8;
            // 
            // label2
            // 
            this.label2.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Right)));
            this.label2.AutoSize = true;
            this.label2.Font = new System.Drawing.Font("Microsoft Sans Serif", 10F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label2.Location = new System.Drawing.Point(229, 94);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(76, 20);
            this.label2.TabIndex = 4;
            this.label2.Text = "Quantity:";
            // 
            // txtBoxQuantity
            // 
            this.txtBoxQuantity.Anchor = ((System.Windows.Forms.AnchorStyles)(((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.txtBoxQuantity.Font = new System.Drawing.Font("Microsoft Sans Serif", 10F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.txtBoxQuantity.Location = new System.Drawing.Point(318, 85);
            this.txtBoxQuantity.Name = "txtBoxQuantity";
            this.txtBoxQuantity.Size = new System.Drawing.Size(188, 26);
            this.txtBoxQuantity.TabIndex = 5;
            // 
            // btnUpdate
            // 
            this.btnUpdate.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Left)));
            this.btnUpdate.Location = new System.Drawing.Point(318, 132);
            this.btnUpdate.Name = "btnUpdate";
            this.btnUpdate.Size = new System.Drawing.Size(187, 41);
            this.btnUpdate.TabIndex = 6;
            this.btnUpdate.Text = "Update";
            this.btnUpdate.UseVisualStyleBackColor = true;
            this.btnUpdate.Click += new System.EventHandler(this.btnUpdate_Click);
            // 
            // btnConfirmOrder
            // 
            this.btnConfirmOrder.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Right)));
            this.btnConfirmOrder.Location = new System.Drawing.Point(118, 132);
            this.btnConfirmOrder.Name = "btnConfirmOrder";
            this.btnConfirmOrder.Size = new System.Drawing.Size(187, 41);
            this.btnConfirmOrder.TabIndex = 1;
            this.btnConfirmOrder.Text = "Print Receipt";
            this.btnConfirmOrder.UseVisualStyleBackColor = true;
            this.btnConfirmOrder.Click += new System.EventHandler(this.btnConfirmOrder_Click);
            // 
            // txtPrintTitle
            // 
            this.txtPrintTitle.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Right)));
            this.txtPrintTitle.AutoSize = true;
            this.txtPrintTitle.Font = new System.Drawing.Font("Microsoft Sans Serif", 16F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.txtPrintTitle.Location = new System.Drawing.Point(198, 0);
            this.txtPrintTitle.Name = "txtPrintTitle";
            this.txtPrintTitle.Size = new System.Drawing.Size(107, 30);
            this.txtPrintTitle.TabIndex = 2;
            this.txtPrintTitle.Text = "Receipt";
            this.txtPrintTitle.Visible = false;
            // 
            // printPreviewDialog1
            // 
            this.printPreviewDialog1.AutoScrollMargin = new System.Drawing.Size(0, 0);
            this.printPreviewDialog1.AutoScrollMinSize = new System.Drawing.Size(0, 0);
            this.printPreviewDialog1.ClientSize = new System.Drawing.Size(400, 300);
            this.printPreviewDialog1.Enabled = true;
            this.printPreviewDialog1.Icon = ((System.Drawing.Icon)(resources.GetObject("printPreviewDialog1.Icon")));
            this.printPreviewDialog1.Name = "printPreviewDialog1";
            this.printPreviewDialog1.Visible = false;
            // 
            // printDocument1
            // 
            this.printDocument1.PrintPage += new System.Drawing.Printing.PrintPageEventHandler(this.printDocument1_PrintPage);
            // 
            // OrderMedicine
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(8F, 16F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(1037, 508);
            this.Controls.Add(this.tableLayoutPanel1);
            this.Margin = new System.Windows.Forms.Padding(4);
            this.Name = "OrderMedicine";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "OrderMedicine";
            this.FormClosing += new System.Windows.Forms.FormClosingEventHandler(this.OrderMedicine_FormClosing);
            this.tableLayoutPanel1.ResumeLayout(false);
            ((System.ComponentModel.ISupportInitialize)(this.dgvMedicineManagement)).EndInit();
            this.tableLayoutPanel3.ResumeLayout(false);
            this.tableLayoutPanel3.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dgvOrderList)).EndInit();
            this.tableLayoutPanel2.ResumeLayout(false);
            this.tableLayoutPanel2.PerformLayout();
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel1;
        private System.Windows.Forms.DataGridView dgvMedicineManagement;
        private System.Windows.Forms.DataGridViewTextBoxColumn MedicineId;
        private System.Windows.Forms.DataGridViewTextBoxColumn MedicineName;
        private System.Windows.Forms.DataGridViewTextBoxColumn MedicineQuantity;
        private System.Windows.Forms.DataGridViewTextBoxColumn MedicinePricePerUnit;
        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel3;
        private System.Windows.Forms.TextBox txtSearchByName;
        private System.Windows.Forms.Label lblSearchByName;
        private System.Windows.Forms.DataGridView dgvOrderList;
        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel2;
        private System.Windows.Forms.Button btnConfirmOrder;
        private System.Windows.Forms.Button btnBack;
        private System.Windows.Forms.Label txtPrintTitle;
        private System.Windows.Forms.DataGridViewTextBoxColumn OrderedMedicineName;
        private System.Windows.Forms.DataGridViewTextBoxColumn OrderedPerUnitPrice;
        private System.Windows.Forms.DataGridViewTextBoxColumn OrderedQuantity;
        private System.Windows.Forms.DataGridViewTextBoxColumn OrderedPrice;
        private System.Windows.Forms.DataGridViewTextBoxColumn AddedMedicineId;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.TextBox txtBoxQuantity;
        private System.Windows.Forms.Button btnUpdate;
        private System.Windows.Forms.PrintPreviewDialog printPreviewDialog1;
        private System.Drawing.Printing.PrintDocument printDocument1;
    }
}