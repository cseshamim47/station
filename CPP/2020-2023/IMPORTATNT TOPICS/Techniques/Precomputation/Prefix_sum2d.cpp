#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n;
    cin >> n;
    n++;
    int ar[n][n] = {0};
    int pf[n][n] = {0};
    for(int i = 1; i < n; i++)
    {
        for(int j = 1; j < n; j++)
        {
            cin >> ar[i][j];
            pf[i][j] = ar[i][j] + pf[i-1][j] + pf[i][j-1] - pf[i-1][j-1];
        }
    }

    int q;
    cin >> q;
    while(q--)
    {
        int a,b,c,d;
        cin >> a >> b >> c >> d;
        // cout << pf[c][d] << endl;
        cout << pf[c][d] - pf[a-1][d] - pf[c][b-1] + pf[a-1][b-1] << endl;
    }
}
// TC : o(n^2) + o(q);
int32_t main()
{
    w(t)
}

/* 
Given 2d array a of N*N integers. Given
Q queries and in each query given a, b, c and d
print sum of square represented by (a,b) as
top left point and (c,d) as bottom right 
point

constrains
1 <= N <= 10^3
1 <= a[i][j] <= 10^9
1 <= Q <= 10^5
1 <= a,b,c,d <= N


2
3
1 2 3
4 5 6
7 8 9
*/

