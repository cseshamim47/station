#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

void solve()
{
    int n,m,a,b;
    cin >> n >> m >> a >> b;
    char arr[n][m+1];
    for(int i = 0; i < n; i++)
    {
        for(int k = 0; k < m; k++)
        {
            cin >> arr[i][k];
        }
        arr[i][m] = '*';
    } 
    int sum = 0;
    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < m; j++)
        {
            if(arr[i][j] == '.' && arr[i][j+1] == '.')
            {
                sum += min(a*2,b);
                j++;
                // getchar();
            }
            else if(arr[i][j] == '.') 
            {
                sum += a;
            }
        }
    }
    cout << sum << endl;
}

int main()
{
      //        Bismillah
    w(t)
    
}


