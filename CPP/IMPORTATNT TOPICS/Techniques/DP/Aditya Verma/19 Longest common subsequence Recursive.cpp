#include <bits/stdc++.h>
using namespace std;

int mem[100][100];

int cnt = 0;
int LCS(string a, string b, int n, int m)
{
    cnt++;
    if(n == 0 || m == 0) return 0;

    if(mem[n][m] != -1) return mem[n][m];

    if(a[n-1] == b[m-1])
    {
        return mem[n][m] = 1 + LCS(a,b,n-1,m-1);
    }
    else
    {
        return mem[n][m] = max(LCS(a,b,n-1,m), LCS(a,b,n,m-1));
    }
}

int main()
{
    memset(mem,-1,sizeof(mem));
    string a;
    string b;
    cin >> a >> b;

    int n = a.size();
    int m = b.size();

    cout << LCS(a,b,n,m) << endl; 
    cout << cnt << endl;
}



// abcdefg
// abdkmfo

// abdf

// abck
// abmc

// 3