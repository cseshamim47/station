namespace BasicCalculatorAssignment
{
    public partial class BasicCalculator : Form
    {
        public BasicCalculator()
        {
            InitializeComponent();
        }

        double num1, num2, result;
        int operation;

        private void RemoveZero(string number)
        {
            if (this.lblInfo.Text.Trim() != String.Empty)
                this.lblInfo.Text = String.Empty;

            if (this.txtResult.Text == "0")
                this.txtResult.Text = number ;
            else this.txtResult.Text += number ;
        }

        private void btn1_Click(object sender, EventArgs e)
        {
            this.RemoveZero("1");
        }

        private void btn2_Click(object sender, EventArgs e)
        {
            this.RemoveZero("2");
        }

        private void btn3_Click(object sender, EventArgs e)
        {
            RemoveZero("3");
        }

        private void btn4_Click(object sender, EventArgs e)
        {
            RemoveZero("4");
        }

        private void btn5_Click(object sender, EventArgs e)
        {
            RemoveZero("5");
        }

        private void btn6_Click(object sender, EventArgs e)
        {
            this.RemoveZero("6");
        }

        private void btn7_Click(object sender, EventArgs e)
        {
            RemoveZero("7");
        }

        private void btn8_Click(object sender, EventArgs e)
        {
            RemoveZero("8");
        }

        private void btnAddition_Click(object sender, EventArgs e)
        {
            if (this.txtResult.Text.Trim() == String.Empty || this.txtResult.Text.Trim() == "0")
                MessageBox.Show("Invalid Value!!! Please enter valid value" , "Error Value", MessageBoxButtons.OK, MessageBoxIcon.Information);
            num1 = Convert.ToDouble(this.txtResult.Text);
            operation = 1;

            //MessageBox.Show(num1.ToString());
            this.txtResult.Text = "";
            this.lblInfo.Text = "";
        }

        private void btnEqual_Click(object sender, EventArgs e)
        {
            if (this.txtResult.Text.Trim() == String.Empty || this.txtResult.Text.Trim() == "0")
                MessageBox.Show("Invalid Value!!! Please enter valid value", "Error Value", MessageBoxButtons.OK, MessageBoxIcon.Information);

            num2 = Convert.ToDouble(this.txtResult.Text.Trim());

            resultCalculatoin();
        }

        private void resultCalculatoin()
        {
            switch (operation)
            {
                case 1:
                    result = num1 + num2;
                    this.txtResult.Text = result.ToString();
                    break;

                case 2:
                    result = num1 - num2;
                    this.txtResult.Text = result.ToString();
                    break;

                case 3:
                    result = num1 * num2;
                    this.txtResult.Text = result.ToString();
                    break;

                case 4:
                    result = num1 / num2;
                    this.txtResult.Text = result.ToString();
                    break;

                default:
                    break;
            }

        }

        private void btnMinus_Click(object sender, EventArgs e)
        {
            if (this.txtResult.Text.Trim() == String.Empty || this.txtResult.Text.Trim() == "0")
                MessageBox.Show("Invalid Value!!! Please enter valid value", "Error Value", MessageBoxButtons.OK, MessageBoxIcon.Information);
            num1 = Convert.ToDouble(this.txtResult.Text);
            operation = 2;

            //MessageBox.Show(num1.ToString());
            this.txtResult.Text = "";
            this.lblInfo.Text = "";
        }

        private void btnMul_Click(object sender, EventArgs e)
        {
            if (this.txtResult.Text.Trim() == String.Empty || this.txtResult.Text.Trim() == "0")
                MessageBox.Show("Invalid Value!!! Please enter valid value", "Error Value", MessageBoxButtons.OK, MessageBoxIcon.Information);
            num1 = Convert.ToDouble(this.txtResult.Text);
            operation = 3;

            //MessageBox.Show(num1.ToString());
            this.txtResult.Text = "";
            this.lblInfo.Text = "";
        }

        private void btnDivision_Click(object sender, EventArgs e)
        {
            if (this.txtResult.Text.Trim() == String.Empty || this.txtResult.Text.Trim() == "0")
                MessageBox.Show("Invalid Value!!! Please enter valid value", "Error Value", MessageBoxButtons.OK, MessageBoxIcon.Information);
            num1 = Convert.ToDouble(this.txtResult.Text);
            operation = 4;

            //MessageBox.Show(num1.ToString());
            this.txtResult.Text = "";
            this.lblInfo.Text = "";
        }

        private void btnClear_Click(object sender, EventArgs e)
        {
            num1 = 0;
            num2 = 0;
            operation = 0;
            this.txtResult.Text = "0";

        }

        private void btnDott_Click(object sender, EventArgs e)
        {
            if (this.txtResult.Text != "0")
            {
                if ( this.txtResult.Text.Contains(".") )
                this.txtResult.Text += "0";
            }
        }

        private void btn9_Click(object sender, EventArgs e)
        {
            RemoveZero("9");
        }

        private void btn0_Click(object sender, EventArgs e)
        {
            RemoveZero("0");
        }
    }
}