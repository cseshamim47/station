#include <bits/stdc++.h>
using namespace std;

#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006

void bruteforce()
{}

bool isPalindrome(string S)
{
    // Iterate over the range [0, N/2]
    for (int i = 0; i < S.length() / 2; i++) {
 
        // If S[i] is not equal to
        // the S[N-i-1]
        if (S[i] != S[S.length() - i - 1]) {
            // Return No
            return false;
        }
    }
    // Return "Yes"
    return true;
}

bool areBracketsBalanced(string expr)
{
	stack<char> s;
	char x;

	// Traversing the Expression
	for (int i = 0; i < expr.length(); i++)
	{
		if (expr[i] == '(' || expr[i] == '['
			|| expr[i] == '{')
		{
			// Push the element in the stack
			s.push(expr[i]);
			continue;
		}

		// IF current current character is not opening
		// bracket, then it must be closing. So stack
		// cannot be empty at this point.
		if (s.empty())
			return false;

		switch (expr[i]) {
		case ')':
			
			// Store the top element in a
			x = s.top();
			s.pop();
			if (x == '{' || x == '[')
				return false;
			break;

		case '}':

			// Store the top element in b
			x = s.top();
			s.pop();
			if (x == '(' || x == '[')
				return false;
			break;

		case ']':

			// Store the top element in c
			x = s.top();
			s.pop();
			if (x == '(' || x == '{')
				return false;
			break;
		}
	}

	// Check Empty Stack
	return (s.empty());
}


int Case;

void solve()
{
    int n;
    string str;
    cin >> n >> str;
    // if(n == 1)
    // {
    //     cout << 0 << " " << 1 << endl;
    //     return;
    // }

    int op = 0;
    int cnt = 0;
    int l = -1;
    int i;
    for(i = 0; i < s(str); i++)
    {
        if(i+1 < s(str) && str[i] == '(' && l == -1)
        {
            op++;
            i++;
            cnt+=2;
        }else if(str[i] == ')')
        {
            if(l != -1)
            {
                op++;
                cnt+=(i-l+1);
                l = -1;
            }else
                l = i;
        }
    }
    // if(l != -1) cnt += (i-l);
    cout << op << " " << n-cnt << endl;
    return;



    /// time limit exeeded
    string sb = "";
    // int i;
    int x = 0;
    int k = 2;
    k = 2;
    for(i = 1; i < n; i++)
    {
        sb = str.substr(x,k);
        // cout << x << " " << k << endl;
        if(s(sb) >= 2 && (isPalindrome(sb) || areBracketsBalanced(sb)))
        {
            op++;
            x = i+1;
            // i = i+
            i++;
            k=2;
            sb = str.substr(x,x+1);
            // i++;
        }else k++;
        // cout << sb << endl;
    }

    // if(s(sb) >= 2 && (isPalindrome(sb) || areBracketsBalanced(sb)))
    // {
    //     sb = "";
    // }
    cout << op << " " << s(sb) << endl;
}

int32_t main()
{
    // cout << isPalindrome(")((((") << endl;
      //        Bismillah
    // BOOST
    w(t)
    //solve();
    //bruteforce();
}