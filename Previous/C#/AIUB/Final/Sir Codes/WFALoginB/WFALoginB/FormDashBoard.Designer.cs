namespace WFALoginB
{
    partial class FormDashBoard
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
            this.panel1 = new System.Windows.Forms.Panel();
            this.dgvMovie = new System.Windows.Forms.DataGridView();
            this.panel2 = new System.Windows.Forms.Panel();
            this.btnShowDetails = new System.Windows.Forms.Button();
            this.Id = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.Title = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.IMDB = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.Income = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.ReleaseDate = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.Genre = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.panel1.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dgvMovie)).BeginInit();
            this.panel2.SuspendLayout();
            this.SuspendLayout();
            // 
            // panel1
            // 
            this.panel1.Controls.Add(this.dgvMovie);
            this.panel1.Dock = System.Windows.Forms.DockStyle.Bottom;
            this.panel1.Location = new System.Drawing.Point(0, 245);
            this.panel1.Name = "panel1";
            this.panel1.Size = new System.Drawing.Size(654, 231);
            this.panel1.TabIndex = 0;
            // 
            // dgvMovie
            // 
            this.dgvMovie.AllowUserToAddRows = false;
            this.dgvMovie.AllowUserToDeleteRows = false;
            this.dgvMovie.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvMovie.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.Id,
            this.Title,
            this.IMDB,
            this.Income,
            this.ReleaseDate,
            this.Genre});
            this.dgvMovie.Dock = System.Windows.Forms.DockStyle.Fill;
            this.dgvMovie.Location = new System.Drawing.Point(0, 0);
            this.dgvMovie.Name = "dgvMovie";
            this.dgvMovie.ReadOnly = true;
            this.dgvMovie.Size = new System.Drawing.Size(654, 231);
            this.dgvMovie.TabIndex = 0;
            // 
            // panel2
            // 
            this.panel2.Controls.Add(this.btnShowDetails);
            this.panel2.Dock = System.Windows.Forms.DockStyle.Bottom;
            this.panel2.Location = new System.Drawing.Point(0, 215);
            this.panel2.Name = "panel2";
            this.panel2.Size = new System.Drawing.Size(654, 30);
            this.panel2.TabIndex = 1;
            // 
            // btnShowDetails
            // 
            this.btnShowDetails.Font = new System.Drawing.Font("Microsoft Sans Serif", 8.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnShowDetails.Location = new System.Drawing.Point(532, 4);
            this.btnShowDetails.Name = "btnShowDetails";
            this.btnShowDetails.Size = new System.Drawing.Size(119, 23);
            this.btnShowDetails.TabIndex = 0;
            this.btnShowDetails.Text = "Show Details >>";
            this.btnShowDetails.UseVisualStyleBackColor = true;
            this.btnShowDetails.Click += new System.EventHandler(this.btnShowDetails_Click);
            // 
            // Id
            // 
            this.Id.DataPropertyName = "Id";
            this.Id.HeaderText = "Movie ID";
            this.Id.Name = "Id";
            this.Id.ReadOnly = true;
            // 
            // Title
            // 
            this.Title.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.Title.DataPropertyName = "Title";
            this.Title.HeaderText = "Movie Title";
            this.Title.Name = "Title";
            this.Title.ReadOnly = true;
            // 
            // IMDB
            // 
            this.IMDB.DataPropertyName = "IMDB";
            this.IMDB.HeaderText = "IMDB";
            this.IMDB.Name = "IMDB";
            this.IMDB.ReadOnly = true;
            // 
            // Income
            // 
            this.Income.DataPropertyName = "Income";
            this.Income.HeaderText = "Box Office";
            this.Income.Name = "Income";
            this.Income.ReadOnly = true;
            // 
            // ReleaseDate
            // 
            this.ReleaseDate.DataPropertyName = "ReleaseDate";
            this.ReleaseDate.HeaderText = "Release Date";
            this.ReleaseDate.Name = "ReleaseDate";
            this.ReleaseDate.ReadOnly = true;
            // 
            // Genre
            // 
            this.Genre.DataPropertyName = "Genre";
            this.Genre.HeaderText = "Genre";
            this.Genre.Name = "Genre";
            this.Genre.ReadOnly = true;
            // 
            // FormDashBoard
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(654, 476);
            this.Controls.Add(this.panel2);
            this.Controls.Add(this.panel1);
            this.Name = "FormDashBoard";
            this.Text = "FormDashBoard";
            this.panel1.ResumeLayout(false);
            ((System.ComponentModel.ISupportInitialize)(this.dgvMovie)).EndInit();
            this.panel2.ResumeLayout(false);
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.Panel panel1;
        private System.Windows.Forms.DataGridView dgvMovie;
        private System.Windows.Forms.Panel panel2;
        private System.Windows.Forms.Button btnShowDetails;
        private System.Windows.Forms.DataGridViewTextBoxColumn Id;
        private System.Windows.Forms.DataGridViewTextBoxColumn Title;
        private System.Windows.Forms.DataGridViewTextBoxColumn IMDB;
        private System.Windows.Forms.DataGridViewTextBoxColumn Income;
        private System.Windows.Forms.DataGridViewTextBoxColumn ReleaseDate;
        private System.Windows.Forms.DataGridViewTextBoxColumn Genre;
    }
}