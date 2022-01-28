#include <bits/stdc++.h>
using namespace std;

int main()
{
    string a;
    string b;
    cin >> a >> b;

    int n = a.length();
    int m = b.length();

    int up[n+1][m+1];

    for(int i = 0; i < n+1; i++)
    {
        for(int j = 0; j < m+1; j++)
        {
            if(i == 0 || j == 0) up[i][j] = 0;
        }
    }

    for(int i = 1; i < n+1; i++)
    {
        for(int j = 1; j < m+1; j++)
        {
            if(a[i-1]==b[j-1])
            {
                up[i][j] = 1 + up[i-1][j-1];
            }
            else
            {
                up[i][j] = max(up[i-1][j],up[i][j-1]);
            }
        }
    }

    cout << up[n][m] << endl;
}


// abcdefg
// abdkmfo

// abdf

// abck
// abmc

// 3