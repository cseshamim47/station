#include <bits/stdc++.h>
using namespace std;

int main()
{
    string a,b;
    cin >> a >> b;

    int n = a.size();
    int m = b.size();

    int up[n+1][m+1];

    for(int i = 0; i < n+1; i++) up[i][0] = 0;
    for(int i = 0; i < m+1; i++) up[0][i] = 0;

    for(int i = 1; i < n+1; i++)
    {
        for(int j = 1; j < m+1; j++)
        {
            if(a[i-1] == b[j-1])
            {
                up[i][j] = 1 + up[i-1][j-1];
            }
            else
            {
                up[i][j] = max(up[i-1][j],up[i][j-1]);
            }
        }
    }

    string ans = "";
    int i = n, j = m;
    while(i > 0 && j > 0)
    {
        if(a[i-1] == b[j-1])
        {
            ans.push_back(a[i-1]);
            i--;
            j--;
        }
        else
        {
            if(up[i-1][j] > up[i][j-1])
            {
                i--;
            }
            else
            {
                j--;
            }
        }
    }
    reverse(ans.begin(),ans.end());
    cout << ans << endl;
}