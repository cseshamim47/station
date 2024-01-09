namespace rockPaperScissor
{
    partial class Form
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
            this.components = new System.ComponentModel.Container();
            System.Windows.Forms.DataGridViewCellStyle dataGridViewCellStyle2 = new System.Windows.Forms.DataGridViewCellStyle();
            this.tabControl1 = new System.Windows.Forms.TabControl();
            this.tabPage1 = new System.Windows.Forms.TabPage();
            this.tableLayoutPanel1 = new System.Windows.Forms.TableLayoutPanel();
            this.label1 = new System.Windows.Forms.Label();
            this.tableLayoutPanel2 = new System.Windows.Forms.TableLayoutPanel();
            this.label2 = new System.Windows.Forms.Label();
            this.txtPlayer = new System.Windows.Forms.TextBox();
            this.btnPlay = new System.Windows.Forms.Button();
            this.tabPage2 = new System.Windows.Forms.TabPage();
            this.dgvScoreTable = new System.Windows.Forms.DataGridView();
            this.btnQuit = new System.Windows.Forms.Button();
            this.btnEndGame = new System.Windows.Forms.Button();
            this.txtComputerScore = new System.Windows.Forms.TextBox();
            this.btnSi = new System.Windows.Forms.Button();
            this.btnPaper = new System.Windows.Forms.Button();
            this.btnRock = new System.Windows.Forms.Button();
            this.picBoxComputer = new System.Windows.Forms.PictureBox();
            this.picBoxPlayer = new System.Windows.Forms.PictureBox();
            this.txtPlayerScore = new System.Windows.Forms.TextBox();
            this.label8 = new System.Windows.Forms.Label();
            this.label4 = new System.Windows.Forms.Label();
            this.lblPlayerScore = new System.Windows.Forms.Label();
            this.label6 = new System.Windows.Forms.Label();
            this.label5 = new System.Windows.Forms.Label();
            this.lblPlayer = new System.Windows.Forms.Label();
            this.timer1 = new System.Windows.Forms.Timer(this.components);
            this.Player = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.Computer = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.Winner = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.tabControl1.SuspendLayout();
            this.tabPage1.SuspendLayout();
            this.tableLayoutPanel1.SuspendLayout();
            this.tableLayoutPanel2.SuspendLayout();
            this.tabPage2.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dgvScoreTable)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.picBoxComputer)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.picBoxPlayer)).BeginInit();
            this.SuspendLayout();
            // 
            // tabControl1
            // 
            this.tabControl1.Controls.Add(this.tabPage1);
            this.tabControl1.Controls.Add(this.tabPage2);
            this.tabControl1.Location = new System.Drawing.Point(-6, -27);
            this.tabControl1.Name = "tabControl1";
            this.tabControl1.SelectedIndex = 0;
            this.tabControl1.Size = new System.Drawing.Size(1124, 724);
            this.tabControl1.TabIndex = 0;
            // 
            // tabPage1
            // 
            this.tabPage1.Controls.Add(this.tableLayoutPanel1);
            this.tabPage1.Location = new System.Drawing.Point(4, 25);
            this.tabPage1.Name = "tabPage1";
            this.tabPage1.Padding = new System.Windows.Forms.Padding(3);
            this.tabPage1.Size = new System.Drawing.Size(1116, 695);
            this.tabPage1.TabIndex = 0;
            this.tabPage1.Text = "tabPage1";
            this.tabPage1.UseVisualStyleBackColor = true;
            // 
            // tableLayoutPanel1
            // 
            this.tableLayoutPanel1.ColumnCount = 1;
            this.tableLayoutPanel1.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 50F));
            this.tableLayoutPanel1.Controls.Add(this.label1, 0, 0);
            this.tableLayoutPanel1.Controls.Add(this.tableLayoutPanel2, 0, 2);
            this.tableLayoutPanel1.Controls.Add(this.btnPlay, 0, 4);
            this.tableLayoutPanel1.Dock = System.Windows.Forms.DockStyle.Fill;
            this.tableLayoutPanel1.Location = new System.Drawing.Point(3, 3);
            this.tableLayoutPanel1.Name = "tableLayoutPanel1";
            this.tableLayoutPanel1.RowCount = 5;
            this.tableLayoutPanel1.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 50F));
            this.tableLayoutPanel1.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Absolute, 55F));
            this.tableLayoutPanel1.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Absolute, 57F));
            this.tableLayoutPanel1.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Absolute, 43F));
            this.tableLayoutPanel1.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Absolute, 352F));
            this.tableLayoutPanel1.Size = new System.Drawing.Size(1110, 689);
            this.tableLayoutPanel1.TabIndex = 0;
            // 
            // label1
            // 
            this.label1.Anchor = System.Windows.Forms.AnchorStyles.Bottom;
            this.label1.AutoSize = true;
            this.label1.Font = new System.Drawing.Font("Montserrat", 16F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label1.Location = new System.Drawing.Point(331, 145);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(447, 37);
            this.label1.TabIndex = 3;
            this.label1.Text = "Welcome to Rock-Paper-Scissor";
            // 
            // tableLayoutPanel2
            // 
            this.tableLayoutPanel2.ColumnCount = 3;
            this.tableLayoutPanel2.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Absolute, 436F));
            this.tableLayoutPanel2.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Absolute, 24F));
            this.tableLayoutPanel2.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Absolute, 639F));
            this.tableLayoutPanel2.Controls.Add(this.label2, 0, 0);
            this.tableLayoutPanel2.Controls.Add(this.txtPlayer, 2, 0);
            this.tableLayoutPanel2.Dock = System.Windows.Forms.DockStyle.Fill;
            this.tableLayoutPanel2.Location = new System.Drawing.Point(3, 240);
            this.tableLayoutPanel2.Name = "tableLayoutPanel2";
            this.tableLayoutPanel2.RowCount = 1;
            this.tableLayoutPanel2.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 100F));
            this.tableLayoutPanel2.Size = new System.Drawing.Size(1104, 51);
            this.tableLayoutPanel2.TabIndex = 5;
            // 
            // label2
            // 
            this.label2.Anchor = System.Windows.Forms.AnchorStyles.Right;
            this.label2.AutoSize = true;
            this.label2.Font = new System.Drawing.Font("Montserrat", 16F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label2.Location = new System.Drawing.Point(327, 7);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(106, 37);
            this.label2.TabIndex = 4;
            this.label2.Text = "Name:";
            // 
            // txtPlayer
            // 
            this.txtPlayer.Anchor = System.Windows.Forms.AnchorStyles.Left;
            this.txtPlayer.Font = new System.Drawing.Font("Montserrat", 13.8F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.txtPlayer.Location = new System.Drawing.Point(463, 7);
            this.txtPlayer.Name = "txtPlayer";
            this.txtPlayer.Size = new System.Drawing.Size(299, 36);
            this.txtPlayer.TabIndex = 2;
            // 
            // btnPlay
            // 
            this.btnPlay.Anchor = System.Windows.Forms.AnchorStyles.Top;
            this.btnPlay.Font = new System.Drawing.Font("Montserrat", 13.8F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnPlay.Location = new System.Drawing.Point(465, 340);
            this.btnPlay.Name = "btnPlay";
            this.btnPlay.Size = new System.Drawing.Size(180, 54);
            this.btnPlay.TabIndex = 6;
            this.btnPlay.Text = "Play";
            this.btnPlay.UseVisualStyleBackColor = true;
            this.btnPlay.Click += new System.EventHandler(this.btnPlay_Click);
            // 
            // tabPage2
            // 
            this.tabPage2.Controls.Add(this.dgvScoreTable);
            this.tabPage2.Controls.Add(this.btnQuit);
            this.tabPage2.Controls.Add(this.btnEndGame);
            this.tabPage2.Controls.Add(this.txtComputerScore);
            this.tabPage2.Controls.Add(this.btnSi);
            this.tabPage2.Controls.Add(this.btnPaper);
            this.tabPage2.Controls.Add(this.btnRock);
            this.tabPage2.Controls.Add(this.picBoxComputer);
            this.tabPage2.Controls.Add(this.picBoxPlayer);
            this.tabPage2.Controls.Add(this.txtPlayerScore);
            this.tabPage2.Controls.Add(this.label8);
            this.tabPage2.Controls.Add(this.label4);
            this.tabPage2.Controls.Add(this.lblPlayerScore);
            this.tabPage2.Controls.Add(this.label6);
            this.tabPage2.Controls.Add(this.label5);
            this.tabPage2.Controls.Add(this.lblPlayer);
            this.tabPage2.Location = new System.Drawing.Point(4, 25);
            this.tabPage2.Name = "tabPage2";
            this.tabPage2.Padding = new System.Windows.Forms.Padding(3);
            this.tabPage2.Size = new System.Drawing.Size(1116, 695);
            this.tabPage2.TabIndex = 1;
            this.tabPage2.Text = "tabPage2";
            this.tabPage2.UseVisualStyleBackColor = true;
            // 
            // dgvScoreTable
            // 
            this.dgvScoreTable.AllowUserToAddRows = false;
            this.dgvScoreTable.AllowUserToDeleteRows = false;
            this.dgvScoreTable.AllowUserToResizeColumns = false;
            this.dgvScoreTable.AllowUserToResizeRows = false;
            this.dgvScoreTable.BackgroundColor = System.Drawing.Color.White;
            this.dgvScoreTable.BorderStyle = System.Windows.Forms.BorderStyle.None;
            dataGridViewCellStyle2.Alignment = System.Windows.Forms.DataGridViewContentAlignment.MiddleLeft;
            dataGridViewCellStyle2.BackColor = System.Drawing.SystemColors.Control;
            dataGridViewCellStyle2.Font = new System.Drawing.Font("Montserrat SemiBold", 10F, System.Drawing.FontStyle.Bold);
            dataGridViewCellStyle2.ForeColor = System.Drawing.SystemColors.WindowText;
            dataGridViewCellStyle2.SelectionBackColor = System.Drawing.SystemColors.Highlight;
            dataGridViewCellStyle2.SelectionForeColor = System.Drawing.SystemColors.HighlightText;
            dataGridViewCellStyle2.WrapMode = System.Windows.Forms.DataGridViewTriState.True;
            this.dgvScoreTable.ColumnHeadersDefaultCellStyle = dataGridViewCellStyle2;
            this.dgvScoreTable.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvScoreTable.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.Player,
            this.Computer,
            this.Winner});
            this.dgvScoreTable.Location = new System.Drawing.Point(634, 80);
            this.dgvScoreTable.Name = "dgvScoreTable";
            this.dgvScoreTable.ReadOnly = true;
            this.dgvScoreTable.RowHeadersBorderStyle = System.Windows.Forms.DataGridViewHeaderBorderStyle.Single;
            this.dgvScoreTable.RowHeadersVisible = false;
            this.dgvScoreTable.RowHeadersWidth = 51;
            this.dgvScoreTable.RowTemplate.Height = 24;
            this.dgvScoreTable.Size = new System.Drawing.Size(414, 312);
            this.dgvScoreTable.TabIndex = 18;
            // 
            // btnQuit
            // 
            this.btnQuit.Font = new System.Drawing.Font("Montserrat", 13.8F);
            this.btnQuit.Location = new System.Drawing.Point(856, 549);
            this.btnQuit.Name = "btnQuit";
            this.btnQuit.Size = new System.Drawing.Size(181, 42);
            this.btnQuit.TabIndex = 17;
            this.btnQuit.Text = "Quit";
            this.btnQuit.UseVisualStyleBackColor = true;
            this.btnQuit.Click += new System.EventHandler(this.btnQuit_Click);
            // 
            // btnEndGame
            // 
            this.btnEndGame.Font = new System.Drawing.Font("Montserrat", 13.8F);
            this.btnEndGame.Location = new System.Drawing.Point(634, 549);
            this.btnEndGame.Name = "btnEndGame";
            this.btnEndGame.Size = new System.Drawing.Size(181, 42);
            this.btnEndGame.TabIndex = 16;
            this.btnEndGame.Text = "Rename";
            this.btnEndGame.UseVisualStyleBackColor = true;
            this.btnEndGame.Click += new System.EventHandler(this.btnEndGame_Click);
            // 
            // txtComputerScore
            // 
            this.txtComputerScore.Enabled = false;
            this.txtComputerScore.Font = new System.Drawing.Font("Montserrat", 13.8F);
            this.txtComputerScore.Location = new System.Drawing.Point(766, 445);
            this.txtComputerScore.Name = "txtComputerScore";
            this.txtComputerScore.Size = new System.Drawing.Size(80, 36);
            this.txtComputerScore.TabIndex = 15;
            this.txtComputerScore.Text = "0";
            // 
            // btnSi
            // 
            this.btnSi.Font = new System.Drawing.Font("Montserrat", 13.8F);
            this.btnSi.Location = new System.Drawing.Point(57, 518);
            this.btnSi.Name = "btnSi";
            this.btnSi.Size = new System.Drawing.Size(200, 38);
            this.btnSi.TabIndex = 13;
            this.btnSi.Text = "Scissor";
            this.btnSi.UseVisualStyleBackColor = true;
            this.btnSi.Click += new System.EventHandler(this.btnSi_Click);
            // 
            // btnPaper
            // 
            this.btnPaper.Font = new System.Drawing.Font("Montserrat", 13.8F);
            this.btnPaper.Location = new System.Drawing.Point(57, 464);
            this.btnPaper.Name = "btnPaper";
            this.btnPaper.Size = new System.Drawing.Size(200, 38);
            this.btnPaper.TabIndex = 12;
            this.btnPaper.Text = "Paper";
            this.btnPaper.UseVisualStyleBackColor = true;
            this.btnPaper.Click += new System.EventHandler(this.btnPaper_Click);
            // 
            // btnRock
            // 
            this.btnRock.Font = new System.Drawing.Font("Montserrat", 13.8F);
            this.btnRock.Location = new System.Drawing.Point(57, 410);
            this.btnRock.Name = "btnRock";
            this.btnRock.Size = new System.Drawing.Size(200, 38);
            this.btnRock.TabIndex = 11;
            this.btnRock.Text = "Rock";
            this.btnRock.UseVisualStyleBackColor = true;
            this.btnRock.Click += new System.EventHandler(this.btnRock_Click);
            // 
            // picBoxComputer
            // 
            this.picBoxComputer.BorderStyle = System.Windows.Forms.BorderStyle.Fixed3D;
            this.picBoxComputer.Location = new System.Drawing.Point(351, 80);
            this.picBoxComputer.Name = "picBoxComputer";
            this.picBoxComputer.Size = new System.Drawing.Size(200, 312);
            this.picBoxComputer.SizeMode = System.Windows.Forms.PictureBoxSizeMode.Zoom;
            this.picBoxComputer.TabIndex = 10;
            this.picBoxComputer.TabStop = false;
            // 
            // picBoxPlayer
            // 
            this.picBoxPlayer.BorderStyle = System.Windows.Forms.BorderStyle.Fixed3D;
            this.picBoxPlayer.Location = new System.Drawing.Point(57, 80);
            this.picBoxPlayer.Name = "picBoxPlayer";
            this.picBoxPlayer.Size = new System.Drawing.Size(200, 312);
            this.picBoxPlayer.SizeMode = System.Windows.Forms.PictureBoxSizeMode.Zoom;
            this.picBoxPlayer.TabIndex = 9;
            this.picBoxPlayer.TabStop = false;
            // 
            // txtPlayerScore
            // 
            this.txtPlayerScore.Enabled = false;
            this.txtPlayerScore.Font = new System.Drawing.Font("Montserrat", 13.8F);
            this.txtPlayerScore.Location = new System.Drawing.Point(634, 445);
            this.txtPlayerScore.Name = "txtPlayerScore";
            this.txtPlayerScore.Size = new System.Drawing.Size(80, 36);
            this.txtPlayerScore.TabIndex = 8;
            this.txtPlayerScore.Text = "0";
            // 
            // label8
            // 
            this.label8.AutoSize = true;
            this.label8.Font = new System.Drawing.Font("Montserrat", 13.8F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label8.Location = new System.Drawing.Point(760, 413);
            this.label8.Name = "label8";
            this.label8.Size = new System.Drawing.Size(131, 32);
            this.label8.TabIndex = 6;
            this.label8.Text = "Computer";
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Font = new System.Drawing.Font("Montserrat", 13.8F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label4.Location = new System.Drawing.Point(388, 32);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(131, 32);
            this.label4.TabIndex = 5;
            this.label4.Text = "Computer";
            // 
            // lblPlayerScore
            // 
            this.lblPlayerScore.AutoSize = true;
            this.lblPlayerScore.Font = new System.Drawing.Font("Montserrat", 13.8F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblPlayerScore.Location = new System.Drawing.Point(628, 410);
            this.lblPlayerScore.Name = "lblPlayerScore";
            this.lblPlayerScore.Size = new System.Drawing.Size(86, 32);
            this.lblPlayerScore.TabIndex = 4;
            this.lblPlayerScore.Text = "Player";
            // 
            // label6
            // 
            this.label6.AutoSize = true;
            this.label6.Font = new System.Drawing.Font("Montserrat", 13.8F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label6.Location = new System.Drawing.Point(796, 32);
            this.label6.Name = "label6";
            this.label6.Size = new System.Drawing.Size(78, 32);
            this.label6.TabIndex = 3;
            this.label6.Text = "Score";
            // 
            // label5
            // 
            this.label5.AutoSize = true;
            this.label5.Font = new System.Drawing.Font("Montserrat", 13.8F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label5.Location = new System.Drawing.Point(281, 223);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(44, 32);
            this.label5.TabIndex = 2;
            this.label5.Text = "VS";
            // 
            // lblPlayer
            // 
            this.lblPlayer.AutoSize = true;
            this.lblPlayer.Font = new System.Drawing.Font("Montserrat", 13.8F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblPlayer.Location = new System.Drawing.Point(118, 32);
            this.lblPlayer.Name = "lblPlayer";
            this.lblPlayer.Size = new System.Drawing.Size(86, 32);
            this.lblPlayer.TabIndex = 0;
            this.lblPlayer.Text = "Player";
            // 
            // Player
            // 
            this.Player.DataPropertyName = "Player";
            this.Player.HeaderText = "Player";
            this.Player.MinimumWidth = 6;
            this.Player.Name = "Player";
            this.Player.ReadOnly = true;
            // 
            // Computer
            // 
            this.Computer.DataPropertyName = "Computer";
            this.Computer.HeaderText = "Computer";
            this.Computer.MinimumWidth = 6;
            this.Computer.Name = "Computer";
            this.Computer.ReadOnly = true;
            // 
            // Winner
            // 
            this.Winner.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.Winner.DataPropertyName = "Winter";
            this.Winner.HeaderText = "Winner";
            this.Winner.MinimumWidth = 6;
            this.Winner.Name = "Winner";
            this.Winner.ReadOnly = true;
            // 
            // Form
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(8F, 16F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(1115, 613);
            this.Controls.Add(this.tabControl1);
            this.MaximizeBox = false;
            this.Name = "Form";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Rock-Paper-Scissor";
            this.Load += new System.EventHandler(this.Form_Load);
            this.tabControl1.ResumeLayout(false);
            this.tabPage1.ResumeLayout(false);
            this.tableLayoutPanel1.ResumeLayout(false);
            this.tableLayoutPanel1.PerformLayout();
            this.tableLayoutPanel2.ResumeLayout(false);
            this.tableLayoutPanel2.PerformLayout();
            this.tabPage2.ResumeLayout(false);
            this.tabPage2.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dgvScoreTable)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.picBoxComputer)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.picBoxPlayer)).EndInit();
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.TabControl tabControl1;
        private System.Windows.Forms.TabPage tabPage1;
        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel1;
        private System.Windows.Forms.TabPage tabPage2;
        private System.Windows.Forms.TextBox txtPlayer;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel2;
        private System.Windows.Forms.Button btnPlay;
        private System.Windows.Forms.Label label8;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.Label lblPlayerScore;
        private System.Windows.Forms.Label label6;
        private System.Windows.Forms.Label label5;
        private System.Windows.Forms.Label lblPlayer;
        private System.Windows.Forms.TextBox txtPlayerScore;
        private System.Windows.Forms.PictureBox picBoxPlayer;
        private System.Windows.Forms.Button btnSi;
        private System.Windows.Forms.Button btnPaper;
        private System.Windows.Forms.Button btnRock;
        private System.Windows.Forms.PictureBox picBoxComputer;
        private System.Windows.Forms.TextBox txtComputerScore;
        private System.Windows.Forms.Button btnQuit;
        private System.Windows.Forms.Button btnEndGame;
        private System.Windows.Forms.DataGridView dgvScoreTable;
        private System.Windows.Forms.Timer timer1;
        private System.Windows.Forms.DataGridViewTextBoxColumn Player;
        private System.Windows.Forms.DataGridViewTextBoxColumn Computer;
        private System.Windows.Forms.DataGridViewTextBoxColumn Winner;
    }
}

