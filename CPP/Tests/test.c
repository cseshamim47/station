#include <stdio.h>

void solve()
{
    int arr[5];
    int sum = 0;
    for(int i = 0; i < 5; i++)
    {
        cin >> arr[i];
        sum += arr[i];
    }
    
    cout << sum-arr[4] << " " << sum-arr[0] << endl;
}

int main()
{
    solve();
}