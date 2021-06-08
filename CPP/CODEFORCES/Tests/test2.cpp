// C++ program to multiply two numbers represented
// as strings.
#include <bits/stdc++.h>
using namespace std;

// Multiplies str1 and str2, and prints result.
string multiply(string num1, string num2)
{
	int len1 = num1.size();
	int len2 = num2.size();
	if (len1 == 0 || len2 == 0)
		return "0";

	// will keep the result number in vector
	// in reverse order
	vector<int> result(len1 + len2, 0);

	// Below two indexes are used to find positions
	// in result.
	int i_n1 = 0;
	int i_n2 = 0;

	// Go from right to left in num1
	for (int i = len1 - 1; i >= 0; i--)
	{
		int carry = 0;
		int n1 = num1[i] - '0'; // 9
		cout << "value of i : " << i << endl;
		cout << "line 28 : n1 : " << n1 << endl;
		getchar();

		// To shift position to left after every
		// multiplication of a digit in num2
		i_n2 = 0;

		// Go from right to left in num2
		for (int j = len2 - 1; j >= 0; j--)
		{
			// Take current digit of second number
			int n2 = num2[j] - '0'; // 9 9
			cout << "Value of j : " << j << endl;
			cout << "line 40 : n2 : " << n2 << endl;
			getchar();

			// Multiply with current digit of first number
			// and add result to previously stored result
			// at current position.
			int sum = n1 * n2 + result[i_n1 + i_n2] + carry; // 96
			cout << "i_n1 i_n2 : " << i_n1 << " " << i_n2 << endl;
			cout << "carry : " << carry << endl;
			cout << "Line 49 : sum : " << sum << endl;
			getchar();
			// Carry for next iteration
			carry = sum / 10; // 9

			cout << "Line 55 : carry " << carry << endl;

			// Store result
			result[i_n1 + i_n2] = sum % 10; // result[0,1] = 1,6
			cout << "i_n1 value : " << i_n1 << "\ni_n2 value : " << i_n2 << endl;
			cout << "Result line 60  : " << result[i_n1 + i_n2] << endl;
			getchar();

			i_n2++; // 1
		}

		// store carry in next cell
		if (carry > 0)
		{
			result[i_n1 + i_n2] += carry; // result[0,1,2] = 1,8,8
			cout << "Carry : " << carry << endl;
			cout << "i_n1 value : " << i_n1 << "\ni_n2 value : " << i_n2 << endl;
			cout << "result line 70 : " << result[i_n1 + i_n2] << endl;
			getchar();
		}
		// To shift position to left after every
		// multiplication of a digit in num1.
		i_n1++; // 1
		cout << "i_n1++ : " << i_n1 << endl;
		cout << "Main loop " << i << " done!" << endl;
		getchar();
	}

	// ignore '0's from the right
	int i = result.size() - 1;
	while (i >= 0 && result[i] == 0)
	{
		cout << "i >= 0 : " << i << endl;
		cout << "result[i] : " << result[i] << endl;

		i--;
		getchar();
	}

	// If all were '0's - means either both or
	// one of num1 or num2 were '0'
	if (i == -1)
		return "0";

	// generate the result string
	string s = "";

	while (i >= 0)
	{
		s += std::to_string(result[i]);
		cout << "i : " << i << endl;
		cout << "result[i] : " << result[i] << endl;
		cout << "s = " << s << endl;
		getchar();
		i--;
	}

	return s;
}

// Driver code
int main()
{
	string str1 = "125";
	string str2 = "10";

	if ((str1.at(0) == '-' || str2.at(0) == '-') &&
		(str1.at(0) != '-' || str2.at(0) != '-'))
		cout << "-";

	if (str1.at(0) == '-')
		str1 = str1.substr(1);

	if (str2.at(0) == '-')
		str2 = str2.substr(1);

	cout << multiply(str1, str2);
	return 0;
}
