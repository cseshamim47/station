namespace cBasicCalculator
{
    public partial class Calculator : Form
    {
        public Calculator()
        {
            InitializeComponent();
        }

        double number1, number2, result, mathOperator;

        private void RemoveZero(string number)
        {
            if (this.txtResult.Text == "0")
                this.txtResult.Text = number;
            else this.txtResult.Text += number;
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
            this.RemoveZero("3");
        }

        private void btn4_Click(object sender, EventArgs e)
        {
            this.RemoveZero("4");
        }

        private void btn5_Click(object sender, EventArgs e)
        {
            this.RemoveZero("5");
        }

        private void btn6_Click(object sender, EventArgs e)
        {
            this.RemoveZero("6");
        }

        private void btn7_Click(object sender, EventArgs e)
        {
            this.RemoveZero("7");
        }

        private void btnPlus_Click(object sender, EventArgs e)
        {
            if (this.txtResult.Text.Trim() == String.Empty || this.txtResult.Text.Trim() == "0")
                MessageBox.Show("Error!!", " Enter Valid Value", MessageBoxButtons.OK, MessageBoxIcon.Information);
            number1 = Convert.ToDouble(this.txtResult.Text);
            mathOperator = 1;

            this.txtResult.Text = "";
        }

        private void btnMinus_Click(object sender, EventArgs e)
        {
            if (this.txtResult.Text.Trim() == String.Empty || this.txtResult.Text.Trim() == "0")
                MessageBox.Show("Error!!", " Enter Valid Value", MessageBoxButtons.OK, MessageBoxIcon.Information);
            number1 = Convert.ToDouble(this.txtResult.Text);
            mathOperator = 2;

            this.txtResult.Text = "";
        }

        private void btnMultiplication_Click(object sender, EventArgs e)
        {
            if (this.txtResult.Text.Trim() == String.Empty || this.txtResult.Text.Trim() == "0")
                MessageBox.Show("Error!!", " Enter Valid Value", MessageBoxButtons.OK, MessageBoxIcon.Information);
            number1 = Convert.ToDouble(this.txtResult.Text);
            mathOperator = 3;

            this.txtResult.Text = "";
        }

        private void btnDivision_Click(object sender, EventArgs e)
        {
            if (this.txtResult.Text.Trim() == String.Empty || this.txtResult.Text.Trim() == "0")
                MessageBox.Show("Error!!", " Enter Valid Value", MessageBoxButtons.OK, MessageBoxIcon.Information);
            number1 = Convert.ToDouble(this.txtResult.Text);
            mathOperator = 4;

            this.txtResult.Text = "";
        }

        private void btnEqual_Click(object sender, EventArgs e)
        {
            if (this.txtResult.Text.Trim() == String.Empty || this.txtResult.Text.Trim() == "0")
                MessageBox.Show("Error!!", " Enter Valid Value", MessageBoxButtons.OK, MessageBoxIcon.Information);

            number2 = Convert.ToDouble(this.txtResult.Text.Trim());

            resultCalculatoin();
        }

        private void resultCalculatoin()
        {
            switch (mathOperator)
            {
                case 1:
                    result = number1 + number2;
                    this.txtResult.Text = result.ToString();
                    break;

                case 2:
                    result = number1 - number2;
                    this.txtResult.Text = result.ToString();
                    break;

                case 3:
                    result = number1 * number2;
                    this.txtResult.Text = result.ToString();
                    break;

                case 4:
                    result = number1 / number2;
                    this.txtResult.Text = result.ToString();
                    break;

                case 5:
                    result = number1 % number2;
                    this.txtResult.Text = result.ToString();
                    break;

                default:
                    break;
            }

        }

        private void btnClear_Click(object sender, EventArgs e)
        {
            txtResult.Clear();
            result = 0;
            number1 = 0;
            number2 = 0;
        }

        private void btnDott_Click(object sender, EventArgs e)
        {
            if (this.txtResult.Text != "0")
            {
                if (this.txtResult.Text.Contains("."))
                    this.txtResult.Text += "0";
            }
        }

        private void btnDott_Click_1(object sender, EventArgs e)
        {
            this.txtResult.Text = this.txtResult.Text + ".";
        }

        private void btnPercentage_Click(object sender, EventArgs e)
        {
            if (this.txtResult.Text.Trim() == String.Empty || this.txtResult.Text.Trim() == "0")
                MessageBox.Show("Error!!", " Enter Valid Value", MessageBoxButtons.OK, MessageBoxIcon.Information);
            number1 = Convert.ToDouble(this.txtResult.Text);
            mathOperator = 5;

            this.txtResult.Text = "";
        }

        private void btn8_Click(object sender, EventArgs e)
        {
            this.RemoveZero("8");
        }

        private void btn9_Click(object sender, EventArgs e)
        {
            this.RemoveZero("9");
        }

        private void btn0_Click(object sender, EventArgs e)
        {
            this.RemoveZero("0");
        }
    }
}