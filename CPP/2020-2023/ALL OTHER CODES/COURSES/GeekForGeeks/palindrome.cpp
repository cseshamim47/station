#include <iostream>
#include <string>
using namespace std;

int main()
{
    string s = "ababa";
    int start = 0; 
    int end = s.length() - 1;
    while(start<=end){
        if(s[start] != s[end]){
            cout << "Not Plindrome" << endl;
            break;
        }else{
            start++;
            end--;
        }
    }
    if(start>=end)cout << "Palindrome" << endl;
    
}