#include <iostream>

#define CLEAR system("cls");
#define SHOW_CORRECT_ANS cout << "			correct answer " << endl;
#define SHOW_WRONG_ANS cout << "			wrong answer " << endl;
#define PRESS_TO_CONTINUE {cout << "			Press anything to continue!" << endl; getchar(); getchar(); system("cls");}


using namespace std;
class mathGame
{
private:
	int firstnum, secondnum;

public:
	void result(int a, int b)
	{
		firstnum = a;
		secondnum = b;
	}
	int even()
	{
		int ans;
		cout << "which one is even :" << firstnum << " or " << secondnum << "?" << endl;
		cout << "your answer :";
		cin >> ans;
		return ans;
	}
	int odd()
	{
		int ans;
		cout << "Which one is odd number :" << firstnum << " or " << secondnum << "?" << endl;
		cout << "your answer:";
		cin >> ans;
		return ans;
	}
	int largest()
	{
		int ans;
		cout << "which one is largest number :" << firstnum << " or " << secondnum << "?" << endl;
		cout << "your answer";
		cin >> ans;
		return ans;
	}
	int smallest()
	{
		int ans;
		cout << "which one is smallest :" << firstnum << " or " << secondnum << "?" << endl;
		cout << "your answer";
		cin >> ans;
		return ans;
	}

	void allOptions()
	{
		cout << "				GIVEN NUMBERS" << endl;
		cout << "			First Number -> " << firstnum << endl;
		cout << "			Second Number -> " << secondnum << endl;
		cout << "\n			Enter 1 to find even Numbers" << endl;
		cout << "			Enter 2 to find odd 2 Numbers" << endl;
		cout << "			Enter 3 to find largest number" << endl;
		cout << "			Enter 4 to find smallest number" << endl;
		cout << "			enter 0 to exit" << endl;
	}
};
int main()
{
	int a, b, c;
	mathGame m;
	// ------------
	CLEAR
	// ------------
	int ch;
	cout << "				Enter First Number: ";
	cin >> a;
	cout << "				Enter Second Number: ";
	cin >> b;
	m.result(a,b);

	// ------------
	CLEAR
	// ------------

	

	while (ch != 0)
	{
		PRESS_TO_CONTINUE
		m.allOptions();
		cout << "\n			Enter Choice: ";
		cin >> ch;
		switch (ch)
		{
		case 1:
			m.result(a, b); // change
			c = m.even();	// change
			if (c % 2 == 0) // change
			{
				SHOW_CORRECT_ANS
			}
			else
			{
				SHOW_WRONG_ANS
			}

			break;

		case 2:
			m.result(a, b); // change
			c = m.odd();	// change
			if (c % 2 != 0) // change
			{
				cout << "correct answer" << endl;
			}
			else
			{
				cout << "wrong number " << endl;
			} // change m.odd()

			break;
		case 3:
			m.result(a, b);
			c = m.largest();
			if (c > a || c > b)
			{
				cout << "correct ans" << endl;
			}
			else
			{
				cout << "wrong ans" << endl;
			}
			break;
		case 4:
			m.result(a, b);
			c = m.smallest();
			if (c < a || c < b)
			{
				cout << "correct ans" << endl;
			}
			else
			{
				cout << "wrong ans" << endl;
			}
			break;
		default:
			cout << "you choose exit";
		}
	}
}