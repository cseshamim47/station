#include <bits/stdc++.h>
using namespace std;

int main()
{
    int t;
    cin >> t;
    while(t--)
    {
        int n;
        cin >> n;
        int arr[n];
        long prod[n];
        for(int i = 0; i < n; i++)
        {
            cin >> arr[i];
        }

        long lp = 1;

        for(int i = 0; i < n; i++)
        {
            prod[i] = lp;
            lp = lp*arr[i];
        }
        long rp = 1;
        for(int i = n-1; i >= 0; i--)
        {
            prod[i] = prod[i]*rp;
            rp = rp*arr[i];
        }

        for(int i = 0; i < n; i++)
        {
            cout << prod[i] << " "; 
        }
        cout << endl;
    }

}

/*
5
2 4 6 8 10

1920 480 80 10 1   
l = 1 2 8 48 384
r = 960 640 480 384 
1920 960 640 480 384
*/